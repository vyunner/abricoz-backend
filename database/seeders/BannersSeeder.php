<?php

namespace Database\Seeders;

use App\Models\DesktopBanner;
use App\Models\MobileBanner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesktopBanner::create(['image_url' => '/storage/desktop-banners/2.png', 'number' => '1']);
        DesktopBanner::create(['image_url' => '/storage/desktop-banners/3.png', 'number' => '2']);
        DesktopBanner::create(['image_url' => '/storage/desktop-banners/4.png', 'number' => '3']);
        DesktopBanner::create(['image_url' => '/storage/desktop-banners/5.png', 'number' => '4']);

        MobileBanner::create(['image_url' => '/storage/mobile-banners/strawberry.png', 'number' => '1']);
        MobileBanner::create(['image_url' => '/storage/mobile-banners/mandarin.png', 'number' => '2']);
    }
}
