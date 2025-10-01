<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\ProductImage;
use Ecommerce\Models\Product;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            ProductImage::factory()->count(3)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}