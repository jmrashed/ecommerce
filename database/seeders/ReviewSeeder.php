<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\Review;
use Ecommerce\Models\Product;
use Ecommerce\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $users = User::all();

        foreach ($products as $product) {
            // Create 0 to 5 reviews per product
            $numberOfReviews = rand(0, 5);
            for ($i = 0; $i < $numberOfReviews; $i++) {
                Review::factory()->create([
                    'product_id' => $product->id,
                    'user_id' => $users->random()->id,
                ]);
            }
        }
    }
}