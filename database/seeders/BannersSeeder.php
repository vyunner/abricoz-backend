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
        DesktopBanner::create([
            'ru_image_url' => '/storage/desktop-banners/2_ru.png',
            'kz_image_url' => '/storage/desktop-banners/2_kz.png',
            'en_image_url' => '/storage/desktop-banners/2_en.png',
            'number' => '1'
        ]);
        DesktopBanner::create([
            'ru_image_url' => '/storage/desktop-banners/3_ru.png',
            'kz_image_url' => '/storage/desktop-banners/3_kz.png',
            'en_image_url' => '/storage/desktop-banners/3_en.png',
            'number' => '2'
        ]);
        DesktopBanner::create([
            'ru_image_url' => '/storage/desktop-banners/4_ru.png',
            'kz_image_url' => '/storage/desktop-banners/4_kz.png',
            'en_image_url' => '/storage/desktop-banners/4_en.png',
            'number' => '3'
        ]);
        DesktopBanner::create([
            'ru_image_url' => '/storage/desktop-banners/5_ru.png',
            'kz_image_url' => '/storage/desktop-banners/5_kz.png',
            'en_image_url' => '/storage/desktop-banners/5_en.png',
            'number' => '4'
        ]);

        MobileBanner::create([
            'ru_image_url' => '/storage/mobile-banners/strawberry_ru.png',
            'kz_image_url' => '/storage/mobile-banners/strawberry_kz.png',
            'en_image_url' => '/storage/mobile-banners/strawberry_en.png',
            'number' => '1'
        ]);
        MobileBanner::create([
            'ru_image_url' => '/storage/mobile-banners/mandarin_en.png',
            'kz_image_url' => '/storage/mobile-banners/mandarin_en.png',
            'en_image_url' => '/storage/mobile-banners/mandarin_en.png',
            'number' => '2'
        ]);
    }
}
