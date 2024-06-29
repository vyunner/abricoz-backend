<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create(['image_url' => '/storage/banners/2.png', 'number' => '1']);
        Banner::create(['image_url' => '/storage/banners/3.png', 'number' => '2']);
        Banner::create(['image_url' => '/storage/banners/4.png', 'number' => '3']);
        Banner::create(['image_url' => '/storage/banners/5.png', 'number' => '4']);
    }
}
