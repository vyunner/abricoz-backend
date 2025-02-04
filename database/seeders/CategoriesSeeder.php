<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name_ru' => 'Фрукты и овощи',
            'name_kz' => 'Жеміс және тамақтық нәрселер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/bHY4mpyaeyK3dEVgUUguAbTPLjb4bqD98nSPiXHj.webp',
        ]);
        Category::create([
            'name_ru' => 'Мясная продукция',
            'name_kz' => 'Мақта өнімдері',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/WB6keTAMHQ0Kmdru3o2DrNkaWMPa2sworP4eQpDR.webp',
        ]);
        Category::create([
            'name_ru' => 'Рыба и морепродукты',
            'name_kz' => 'Балық және деуінділер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/XdutnfHYvHnOiclvEU0G3LNUagQNMbv7eEFiwEuK.webp',
        ]);
        Category::create([
            'name_ru' => 'Молоко, сыр, масло, яйца',
            'name_kz' => 'Сүт, сыр, мас, жұмыртқа',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/mILSi2rKK1enhQpZRXFZWRVwNtHc19MD1a8pPoRC.webp',
        ]);
        Category::create([
            'name_ru' => 'Хлеб и выпечка',
            'name_kz' => 'Нан, нан өнімдері',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/0ajwzq2qsIbymjqTR5UOau0gfzn1NdHfqqMnLdfX.webp',
        ]);
        Category::create([
            'name_ru' => 'Напитки и соки',
            'name_kz' => 'Сусындар және шырындар',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/hFGjoMNlP0PU5b1Jy5267Ipgr11e4MY2vv9UJXiO.webp',
        ]);
        Category::create([
            'name_ru' => 'Крупы и консервы',
            'name_kz' => 'Жармалар мен консервілер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/IZTy0hqkwGYdRePp9dbtUvC1PXRkxsnBzn2Taalu.webp',
        ]);
        Category::create([
            'name_ru' => 'Зелень',
            'name_kz' => 'Көкөністер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/R2UHwU8tYrf61C1WuqG6vxLxvSoSO7yqQW9tFJ6z.webp',
        ]);
        Category::create([
            'name_ru' => 'Готовая еда и снэки',
            'name_kz' => 'Дайын тағамдар мен снэктер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/oLg0Im6VCEaCfCItYKIW4OmXaEEVkSC01eJgkAdY.webp',
        ]);
        Category::create([
            'name_ru' => 'Кулинария',
            'name_kz' => 'Аспаздық өнімдер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/kIKQRsy4pTZUFsjRmeJUx6vJASeBsXUT2pWTmKwt.webp',
        ]);
        Category::create([
            'name_ru' => 'Колбасы и сосиски',
            'name_kz' => 'Шұжықтар мен сосискалар',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/2tduH1MyhutGNfkUUZYisr7hcr8xAkjkNDSQmsEG.webp',
        ]);
        Category::create([
            'name_ru' => 'Замороженная продукция',
            'name_kz' => 'Мұздатылған өнімдер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/jhPcqjq6NHzDcAPvc1ISZJhAcDS6QKqg51vOpx8I.webp',
        ]);
        Category::create([
            'name_ru' => 'Сладости',
            'name_kz' => 'Тәттілер',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/kLjSF4pT8GnZmWpKQgJDB2FrNetHe5LBrgtmaDVt.webp',
        ]);
        Category::create([
            'name_ru' => 'Хозтовары',
            'name_kz' => 'Тұрмыстық тауарлар',
            'mobile_image_url' => 'https://abricoz-eu.s3.eu-central-1.amazonaws.com/mobileimages/N3qyxcBEJxGnAP4dnggvbppXx1AGoAHRjfiJeUyB.webp',
        ]);
    }
}
