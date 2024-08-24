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
            'image_url' => '/storage/mobile-banners/strawberry_ru.jpeg',
            'title_ru' => 'Заказывайте клубнику в новом приложении от Abricoz!',
            'title_en' => 'Order strawberries in the new Abricoz app!',
            'title_kz' => 'Abricoz жаңа қосымшасында құлпынайға тапсырыс беріңіз!',
            'number' => '1'
        ]);
        MobileBanner::create([
            'image_url' => '/storage/mobile-banners/mandarin_ru.jpeg',
            'title_ru' => 'Одинокий мандарин требует покупки на Abricoz’е!',
            'title_en' => 'A lonely mandarin demands a purchase on Abricoz',
            'title_kz' => 'Abricoz-та жалғыз мандарин сатып алуды талап етеді!',
            'number' => '2'
        ]);
    }
}
