<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\Shipping;
use Ecommerce\Models\Order;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            Shipping::factory()->create([
                'order_id' => $order->id,
                'carrier' => 'FedEx', // Example carrier
                'shipping_cost' => rand(5, 25), // Random shipping cost
            ]);
        }
    }
}