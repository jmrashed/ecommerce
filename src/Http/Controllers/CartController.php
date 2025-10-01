<?php

namespace Jmrashed\Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Jmrashed\Ecommerce\Services\CartService;
use Jmrashed\Ecommerce\Models\Product;
use Jmrashed\Ecommerce\Models\CartItem;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Display the shopping cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = $this->cartService->getCartItems();
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add a product to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jmrashed\Ecommerce\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->addToCart($product, $request->quantity);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    /**
     * Update the quantity of a cart item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jmrashed\Ecommerce\Models\CartItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->updateCartItem($item, $request->quantity);

        return redirect()->route('cart.index')->with('success', 'Cart item updated.');
    }

    /**
     * Remove a cart item.
     *
     * @param  \Jmrashed\Ecommerce\Models\CartItem  $item
     * @return \Illuminate\Http\Response
     */
    public function remove(CartItem $item)
    {
        $this->cartService->removeCartItem($item);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}