<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\Coupon;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'SUMMER20',
            'discount' => 20.00,
            'expires_at' => Carbon::now()->addDays(30),
            'usage_limit' => 100,
        ]);

        Coupon::create([
            'code' => 'SAVE10',
            'discount' => 10.00,
            'expires_at' => Carbon::now()->addDays(60),
            'usage_limit' => 50,
        ]);
    }
}