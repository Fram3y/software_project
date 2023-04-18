<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->tickets = '7';
        $order->user_id = '1';
        $order->cinema_id = '1';
        $order->screening_id = '1';
        $order->movie_id = '1';
        $order->save();

        $order = new Order();
        $order->tickets = '2';
        $order->user_id = '2';
        $order->cinema_id = '3';
        $order->screening_id = '2';
        $order->movie_id = '2';
        $order->save();

        $order = new Order();
        $order->tickets = '3';
        $order->user_id = '1';
        $order->cinema_id = '4';
        $order->screening_id = '1';
        $order->movie_id = '3';
        $order->save();

        $order = new Order();
        $order->tickets = '1';
        $order->user_id = '2';
        $order->cinema_id = '3';
        $order->screening_id = '2';
        $order->movie_id = '4';
        $order->save();
    }
}
