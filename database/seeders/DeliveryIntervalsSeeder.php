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
        DeliveryInterval::create(['name' => '07:00 - 10:00']);
        DeliveryInterval::create(['name' => '10:00 - 13:00']);
        DeliveryInterval::create(['name' => '13:00 - 16:00']);
        DeliveryInterval::create(['name' => '16:00 - 19:00']);
        DeliveryInterval::create(['name' => '19:00 - 22:00']);
    }
}
