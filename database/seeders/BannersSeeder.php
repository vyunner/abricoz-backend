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
            'image_url_ru' => '/storage/desktop-banners/2_ru.png',
            'image_url_kz' => '/storage/desktop-banners/2_kz.png',
            'image_url_en' => '/storage/desktop-banners/2_en.png',
            'number' => '1'
        ]);
        DesktopBanner::create([
            'image_url_ru' => '/storage/desktop-banners/3_ru.png',
            'image_url_kz' => '/storage/desktop-banners/3_kz.png',
            'image_url_en' => '/storage/desktop-banners/3_en.png',
            'number' => '2'
        ]);
        DesktopBanner::create([
            'image_url_ru' => '/storage/desktop-banners/4_ru.png',
            'image_url_kz' => '/storage/desktop-banners/4_kz.png',
            'image_url_en' => '/storage/desktop-banners/4_en.png',
            'number' => '3'
        ]);
        DesktopBanner::create([
            'image_url_ru' => '/storage/desktop-banners/5_ru.png',
            'image_url_kz' => '/storage/desktop-banners/5_kz.png',
            'image_url_en' => '/storage/desktop-banners/5_en.png',
            'number' => '4'
        ]);

        MobileBanner::create([
            'image_url_ru' => '/storage/mobile-banners/strawberry_ru.jpeg',
            'image_url_kz' => '/storage/mobile-banners/strawberry_kz.jpeg',
            'image_url_en' => '/storage/mobile-banners/strawberry_en.jpeg',
            'number' => '1'
        ]);
        MobileBanner::create([
            'image_url_ru' => '/storage/mobile-banners/mandarin_ru.jpeg',
            'image_url_kz' => '/storage/mobile-banners/mandarin_kz.jpeg',
            'image_url_en' => '/storage/mobile-banners/mandarin_en.jpeg',
            'number' => '2'
        ]);
    }
}
