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
        OrderStatus::create(['name' => 'Отменен']);
        OrderStatus::create(['name' => 'В обработке']);
        OrderStatus::create(['name' => 'Собирается']);
        OrderStatus::create(['name' => 'Ожидает курьера']);
        OrderStatus::create(['name' => 'В пути']);
        OrderStatus::create(['name' => 'Доставлен']);
    }
}
