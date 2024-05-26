<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BrandsTableSeeder extends Seeder
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

        // Array to hold the brands
        $brands = [];

        // Generate 100 random brands
        for ($i = 0; $i < 100; $i++) {
            $name = $faker->company;
            $brands[] = [
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->sentence,
                'logo' => $faker->imageUrl(100, 100, 'business', true, 'Faker', true), // URL to a fake logo
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ];
        }

        // Insert the data into the pkg_brands table
        DB::table('pkg_brands')->insert($brands);
    }
}
