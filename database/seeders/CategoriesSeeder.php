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
            'mobile_image_url' => '/storage/categories/fruits_and_vegetables_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Мясная продукция',
            'name_kz' => 'Мақта өнімдері',
            'mobile_image_url' => '/storage/categories/meat_products_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Рыба и морепродукты',
            'name_kz' => 'Балық және деуінділер',
            'mobile_image_url' => '/storage/categories/fish_and_seafood_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Молоко, сыр, масло, яйца',
            'name_kz' => 'Сүт, сыр, мас, жұмыртқа',
            'mobile_image_url' => '/storage/categories/milk_cheese_butter_eggs_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Хлеб и выпечка',
            'name_kz' => 'Нан, нан өнімдері',
            'mobile_image_url' => '/storage/categories/bread_and_pastries_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Напитки и соки',
            'name_kz' => 'Сусындар және шырындар',
            'mobile_image_url' => '/storage/categories/drinks_and_juices_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Крупы и консервы',
            'name_kz' => 'Жармалар мен консервілер',
            'mobile_image_url' => '/storage/categories/cereals_and_canned_foods_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Зелень',
            'name_kz' => 'Көкөністер',
            'mobile_image_url' => '/storage/categories/greens_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Готовая еда и снэки',
            'name_kz' => 'Дайын тағамдар мен снэктер',
            'mobile_image_url' => '/storage/categories/ready_meals_and_snacks_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Кулинария',
            'name_kz' => 'Аспаздық өнімдер',
            'mobile_image_url' => '/storage/categories/culinary_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Колбасы и сосиски',
            'name_kz' => 'Шұжықтар мен сосискалар',
            'mobile_image_url' => '/storage/categories/sausages_and_hot_dogs_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Замороженная продукция',
            'name_kz' => 'Мұздатылған өнімдер',
            'mobile_image_url' => '/storage/categories/frozen_products_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Сладости',
            'name_kz' => 'Тәттілер',
            'mobile_image_url' => '/storage/categories/sweets_mobile.png',
        ]);
        Category::create([
            'name_ru' => 'Хозтовары',
            'name_kz' => 'Тұрмыстық тауарлар',
            'mobile_image_url' => '/storage/categories/household_goods_mobile.png',
        ]);
    }
}
