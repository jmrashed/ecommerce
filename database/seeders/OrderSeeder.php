<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ecommerce\Models\Order;
use Ecommerce\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Order::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}