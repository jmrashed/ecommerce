<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\OrderItem;
use Ecommerce\Models\Order;
use Ecommerce\Models\Product;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            // Create 1 to 3 order items per order
            $numberOfItems = rand(1, 3);
            for ($i = 0; $i < $numberOfItems; $i++) {
                $product = $products->random();
                $quantity = rand(1, 5);
                $price = $product->price;
                $total = $quantity * $price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $total,
                    'product_name' => $product->name,
                ]);
            }
        }
    }
}