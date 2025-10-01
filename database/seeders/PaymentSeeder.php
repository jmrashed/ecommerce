<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\Payment;
use Ecommerce\Models\Order;

class PaymentSeeder extends Seeder
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
            Payment::factory()->create([
                'order_id' => $order->id,
                'amount' => $order->total_amount,
                'status' => 'completed', // Assuming successful payments for seeding
            ]);
        }
    }
}