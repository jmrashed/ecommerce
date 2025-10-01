<?php

namespace Jmrashed\Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Jmrashed\Ecommerce\Services\CartService;
use Jmrashed\Ecommerce\Services\OrderService;
use Jmrashed\Ecommerce\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $orderService;

    public function __construct(CartService $cartService, OrderService $orderService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
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

        return view('checkout.index', compact('cartItems', 'totalAmount'));
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
            'billing_address' => 'required|string|max:255',
            'payment_method' => 'required|string', // e.g., 'stripe', 'paypal'
        ]);

        $customer = Auth::user();
        $cartItems = $this->cartService->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $order = $this->orderService->createOrder($customer, $cartItems, $request->all());

        // Clear the cart after successful order creation
        // $this->cartService->clearCart($customer); // Assuming a clearCart method in CartService

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