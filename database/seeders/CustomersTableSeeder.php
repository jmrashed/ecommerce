<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
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

        // Array to hold the customers
        $customers = [];

        // Generate 100 random customers
        for ($i = 0; $i < 100; $i++) {
            $customers[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => $faker->phoneNumber,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'postal_code' => $faker->postcode,
                'avatar' => 'default_avatar.jpg',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the data into the database
        DB::table('pkg_customers')->insert($customers);
    }
}
