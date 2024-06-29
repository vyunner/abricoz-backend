<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create(['name' => 'Батыс-2', 'delivery_price' => 1000]);
        District::create(['name' => '11-микрорайон', 'delivery_price' => 1000]);
        District::create(['name' => 'Самал', 'delivery_price' => 1000]);
    }
}
