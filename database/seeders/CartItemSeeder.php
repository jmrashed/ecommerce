<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\CartItem;
use Ecommerce\Models\Customer;
use Ecommerce\Models\Product;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();
        $products = Product::all();

        foreach ($customers as $customer) {
            // Create 0 to 3 cart items per customer
            $numberOfItems = rand(0, 3);
            for ($i = 0; $i < $numberOfItems; $i++) {
                CartItem::factory()->create([
                    'customer_id' => $customer->id,
                    'product_id' => $products->random()->id,
                ]);
            }
        }
    }
}