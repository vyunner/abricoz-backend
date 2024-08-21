<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'user_id' => 1,
            'city_id' => 1, // Допустим, это ID города Нью-Йорк
            'district_id' => 1, // Например, это ID района Манхэттен
            'address_street_and_house' => '123 Main St', // Реальный адрес улицы
            'address_apartment' => 'Apt 4B', // Реальная квартира
            'address_entrance' => 'Entrance B', // Реальный вход
            'address_floor' => '4', // Реальный этаж
            'address_comment' => 'Please ring the doorbell labeled "Smith".' // Реальный комментарий
        ]);
    }
}
