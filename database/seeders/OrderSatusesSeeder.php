<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::create(['name' => 'Не оплачен']);
        OrderStatus::create(['name' => 'Оплачен']);
        OrderStatus::create(['name' => 'Доставлен']);
        OrderStatus::create(['name' => 'Отменен']);
    }
}
