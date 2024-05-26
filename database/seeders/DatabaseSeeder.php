<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Jmrashed\Ecommerce\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 products
        Product::factory()->count(50)->create();
    }
}
