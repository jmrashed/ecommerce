<?php
namespace Jmrashed\Ecommerce\Services;

use Illuminate\Support\Facades\Auth;
use Jmrashed\Ecommerce\Models\CartItem;
use Jmrashed\Ecommerce\Models\Product;

class CartService
{
    /**
     * Calculate the total price with coupon discount applied.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $cartItems
     * @param  \Ecommerce\Models\Coupon|null  $coupon
     * @return float
     */
    public function getTotalWithDiscount($cartItems, $coupon = null)
    {
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        if ($coupon && $coupon->isValid()) {
            if ($coupon->discount_type === 'fixed') {
                $total -= $coupon->discount_amount;
            } elseif ($coupon->discount_type === 'percent') {
                $total -= ($total * ($coupon->discount_amount / 100));
            }
        }
        return max($total, 0);
    }
    /**
     * Get the current user's cart items.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCartItems()
    {
        // Assuming a logged-in customer for now.
        // In a real application, you might handle guest carts differently (e.g., using sessions).
        if (Auth::check()) {
            return Auth::user()->cartItems()->with('product')->get();
        }

        return collect(); // Return an empty collection if no user is logged in
    }

    /**
     * Add a product to the cart.
     *
     * @param  \Jmrashed\Ecommerce\Models\Product  $product
     * @param  int  $quantity
     * @return \Jmrashed\Ecommerce\Models\CartItem
     */
    public function addToCart(Product $product, int $quantity)
    {
        if (! Auth::check()) {
            // Handle guest cart logic (e.g., store in session)
            // For now, we'll assume a logged-in user is required.
            throw new \Exception('User must be logged in to add items to cart.');
        }

        $cartItem = Auth::user()->cartItems()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = Auth::user()->cartItems()->create([
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'price'      => $product->price, // Store current price at the time of adding to cart
            ]);
        }

        return $cartItem;
    }

    /**
     * Update the quantity of a cart item.
     *
     * @param  \Jmrashed\Ecommerce\Models\CartItem  $cartItem
     * @param  int  $quantity
     * @return \Jmrashed\Ecommerce\Models\CartItem
     */
    public function updateCartItem(CartItem $cartItem, int $quantity)
    {
        if ($quantity <= 0) {
            $cartItem->delete();
            return null;
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return $cartItem;
    }

    /**
     * Remove a cart item from the cart.
     *
     * @param  \Jmrashed\Ecommerce\Models\CartItem  $cartItem
     * @return bool|null
     */
    public function removeCartItem(CartItem $cartItem)
    {
        return $cartItem->delete();
    }
}
