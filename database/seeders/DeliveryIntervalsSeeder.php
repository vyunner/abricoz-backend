<?php

namespace Database\Seeders;

use App\Models\DeliveryInterval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryIntervalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryInterval::create(['name' => '00:00 - 01:00']);
        DeliveryInterval::create(['name' => '01:00 - 02:00']);
        DeliveryInterval::create(['name' => '02:00 - 03:00']);
        DeliveryInterval::create(['name' => '03:00 - 04:00']);
        DeliveryInterval::create(['name' => '04:00 - 05:00']);
        DeliveryInterval::create(['name' => '05:00 - 06:00']);
        DeliveryInterval::create(['name' => '06:00 - 07:00']);
        DeliveryInterval::create(['name' => '07:00 - 08:00']);
        DeliveryInterval::create(['name' => '08:00 - 09:00']);
        DeliveryInterval::create(['name' => '09:00 - 10:00']);
        DeliveryInterval::create(['name' => '10:00 - 11:00']);
        DeliveryInterval::create(['name' => '11:00 - 12:00']);
        DeliveryInterval::create(['name' => '12:00 - 13:00']);
        DeliveryInterval::create(['name' => '13:00 - 14:00']);
        DeliveryInterval::create(['name' => '14:00 - 15:00']);
        DeliveryInterval::create(['name' => '15:00 - 16:00']);
        DeliveryInterval::create(['name' => '16:00 - 17:00']);
        DeliveryInterval::create(['name' => '17:00 - 18:00']);
        DeliveryInterval::create(['name' => '18:00 - 19:00']);
        DeliveryInterval::create(['name' => '19:00 - 20:00']);
        DeliveryInterval::create(['name' => '20:00 - 21:00']);
        DeliveryInterval::create(['name' => '21:00 - 22:00']);
        DeliveryInterval::create(['name' => '22:00 - 23:00']);
        DeliveryInterval::create(['name' => '23:00 - 00:00']);
    }
}
