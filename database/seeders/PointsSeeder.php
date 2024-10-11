<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Point;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Point::create([
            'city_id' => 1,
            'latitude' => '50.368511',
            'longitude' => '57.021575',
        ]);
        Point::create([
            'city_id' => 1,
            'latitude' => '50.367401',
            'longitude' => '57.414942',
        ]);
        Point::create([
            'city_id' => 1,
            'latitude' => '50.189195',
            'longitude' => '57.414534',
        ]);
        Point::create([
            'city_id' => 1,
            'latitude' => '50.171103',
            'longitude' => '57.036463',
        ]);
    }
}
