<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Jmrashed\Ecommerce\Database\Seeders\AddressSeeder;
use Jmrashed\Ecommerce\Database\Seeders\TagsTableSeeder;
use Jmrashed\Ecommerce\Database\Seeders\BrandsTableSeeder;
use Jmrashed\Ecommerce\Database\Seeders\ProductsTableSeeder;
use Jmrashed\Ecommerce\Database\Seeders\CustomersTableSeeder;
use Jmrashed\Ecommerce\Database\Seeders\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Call other seeders, e.g.
        $this->call(CustomersTableSeeder::class);
        $this->call(AddressSeeder::class);


        // Call the other seeders first
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);

        // Call the ProductsTableSeeder
        $this->call(ProductsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
} 