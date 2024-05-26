<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initialize Faker
        $faker = Faker::create();

        // Fetch all category IDs and brand IDs
        $categoryIds = DB::table('pkg_categories')->pluck('id')->toArray();
        $brandIds = DB::table('pkg_brands')->pluck('id')->toArray();

        // Array to hold the products
        $products = [];

        // Generate products
        foreach ($categoryIds as $categoryId) {
            for ($i = 0; $i < 10; $i++) { // Creating 10 products per category
                $products[] = [
                    'name' => $faker->productName, // Use a custom faker provider for product names or generalize
                    'description' => $faker->paragraph,
                    'price' => $faker->randomFloat(2, 5, 1000), // Prices between $5 and $1000
                    'category_id' => $categoryId,
                    'image_url' => $faker->imageUrl(640, 480, 'technics', true, 'Faker'), // URL to a fake product image
                    'brand_id' => $faker->randomElement($brandIds), // Random brand from existing brands
                    'stock_quantity' => $faker->numberBetween(0, 100),
                    'is_active' => $faker->boolean(90), // 90% chance the product is active
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null
                ];
            }
        }

        // Insert the data into the pkg_products table
        DB::table('pkg_products')->insert($products);
    }
}
