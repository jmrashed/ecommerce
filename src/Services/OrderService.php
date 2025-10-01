<?php

namespace Jmrashed\Ecommerce\Services;

use Jmrashed\Ecommerce\Models\Order;
use Jmrashed\Ecommerce\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * Create a new order.
     *
     * @param  \Jmrashed\Ecommerce\Models\Customer  $customer
     * @param  \Illuminate\Support\Collection  $cartItems
     * @param  array  $data
     * @return \Jmrashed\Ecommerce\Models\Order
     */
    public function createOrder(Customer $customer, Collection $cartItems, array $data)
    {
        return DB::transaction(function () use ($customer, $cartItems, $data) {
            $totalAmount = $cartItems->sum(fn($item) => $item->price * $item->quantity);

            $order = $customer->orders()->create([
                'order_number' => 'ORD-' . uniqid(), // Generate a unique order number
                'total_amount' => $totalAmount,
                'order_status' => 'pending',
                'shipping_address' => $data['shipping_address'],
                'billing_address' => $data['billing_address'],
                'payment_status' => 'pending',
            ]);

            foreach ($cartItems as $cartItem) {
                $order->orderItems()->create([
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                ]);
                // Optionally, decrement product stock here
            }

            // Clear the cart after order creation
            $customer->cartItems()->delete();

            return $order;
        });
    }
}