<?php

namespace Database\Seeders;

use App\Models\DekstopBanner;
use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentType::create(['name' => 'Наличные']);
        PaymentType::create(['name' => 'Банковская карта (RoboKassa)']);
    }
}
