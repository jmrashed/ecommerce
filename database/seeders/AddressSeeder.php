<?php

namespace Jmrashed\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AddressSeeder extends Seeder
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

        // Fetch all customer IDs
        $customerIds = DB::table('pkg_customers')->pluck('id');

        // Array to hold the addresses
        $addresses = [];

        // Generate one address for each customer
        foreach ($customerIds as $customerId) {
            $addresses[] = [
                'customer_id' => $customerId,
                'address_line_1' => $faker->streetAddress,
                'address_line_2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->state,
                'postal_code' => $faker->postcode,
                'country' => $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the data into the pkg_addresses table
        DB::table('pkg_addresses')->insert($addresses);
    }
}
