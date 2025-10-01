<?php
namespace Jmrashed\Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jmrashed\Ecommerce\Models\Order;
use Jmrashed\Ecommerce\Services\CartService;
use Jmrashed\Ecommerce\Services\OrderService;
use Jmrashed\Ecommerce\Services\PaymentService;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $orderService;
    protected $paymentService;

    public function __construct(CartService $cartService, OrderService $orderService, PaymentService $paymentService)
    {
        $this->cartService    = $cartService;
        $this->orderService   = $orderService;
        $this->paymentService = $paymentService;
    }

    /**
     * Display the checkout form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalAmount = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        $shippingMethods = \Ecommerce\Models\Shipping::where('active', true)->get();
        return view('checkout.index', compact('cartItems', 'totalAmount', 'shippingMethods'));
    }

    /**
     * Process the checkout and create an order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'billing_address'  => 'required|string|max:255',
            'payment_method'   => 'required|string', // e.g., 'stripe', 'paypal'
        ]);

        $customer  = Auth::user();
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Get selected shipping method and cost
        $shipping                        = \Ecommerce\Models\Shipping::find($request->shipping_method);
        $shippingCost                    = $shipping ? $shipping->cost : 0;
        $orderData                       = $request->all();
        $orderData['shipping_method_id'] = $shipping ? $shipping->id : null;
        $orderData['shipping_cost']      = $shippingCost;
        $order                           = $this->orderService->createOrder($customer, $cartItems, $orderData);

        try {
            $this->paymentService->processPayment($order, $request->payment_method, $request->all());
        } catch (\Exception $e) {
            // Handle payment failure (e.g., update order status, redirect back with error)
            $order->update(['payment_status' => 'failed']);
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }

        return redirect()->route('checkout.confirmation', $order)->with('success', 'Order placed successfully!');
    }

    /**
     * Display the order confirmation page.
     *
     * @param  \Jmrashed\Ecommerce\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function confirmation(Order $order)
    {
        return view('checkout.confirmation', compact('order'));
    }
}
