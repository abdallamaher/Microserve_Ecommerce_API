<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()->count(20)->create()->each(function ($order) {
            $order->products()->attach([
                [
                    'product_id' => 1,
                    'quantity' => 2,
                    'price' => 2.5,
                    'order_id' => $order->id,
                ]
            ]);
        });
    }
}
