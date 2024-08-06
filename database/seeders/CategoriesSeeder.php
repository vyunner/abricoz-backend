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
            'name_en' => 'Fruits and vegetables',
            'desktop_image_url' => '/storage/categories/apple.svg',
            'mobile_image_url' => '/storage/categories/fruits_and_vegetables_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Мясная продукция',
            'name_kz' => 'Мақта өнімдері',
            'name_en' => 'Meat products',
            'desktop_image_url' => '/storage/categories/drumstick.svg',
            'mobile_image_url' => '/storage/categories/meat_products_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Рыба и морепродукты',
            'name_kz' => 'Балық және деуінділер',
            'name_en' => 'Fish and seafood',
            'desktop_image_url' => '/storage/categories/fish.svg',
            'mobile_image_url' => '/storage/categories/fish_and_seafood_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Молоко, сыр, масло, яйца',
            'name_kz' => 'Сүт, сыр, мас, жұмыртқа',
            'name_en' => 'Milk, cheese, butter, eggs',
            'desktop_image_url' => '/storage/categories/milk.svg',
            'mobile_image_url' => '/storage/categories/milk_cheese_butter_eggs_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Хлеб и выпечка',
            'name_kz' => 'Нан, нан өнімдері',
            'name_en' => 'Bread and pastries',
            'desktop_image_url' => '/storage/categories/bagguette.svg',
            'mobile_image_url' => '/storage/categories/bread_and_pastries_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Напитки и соки',
            'name_kz' => 'Сусындар және шырындар',
            'name_en' => 'Drinks and juices',
            'desktop_image_url' => '/storage/categories/drink.svg',
            'mobile_image_url' => '/storage/categories/drinks_and_juices_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Крупы и консервы',
            'name_kz' => 'Жармалар мен консервілер',
            'name_en' => 'Cereals and canned foods',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/cereals_and_canned_foods_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Зелень',
            'name_kz' => 'Көкөністер',
            'name_en' => 'Greens',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/greens_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Готовая еда и снэки',
            'name_kz' => 'Дайын тағамдар мен снэктер',
            'name_en' => 'Ready meals and snacks',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/ready_meals_and_snacks_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Кулинария',
            'name_kz' => 'Аспаздық өнімдер',
            'name_en' => 'Culinary',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/culinary_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Колбасы и сосиски',
            'name_kz' => 'Шұжықтар мен сосискалар',
            'name_en' => 'Sausages and hot dogs',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/sausages_and_hot_dogs_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Замороженная продукция',
            'name_kz' => 'Мұздатылған өнімдер',
            'name_en' => 'Frozen products',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/frozen_products_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Сладости',
            'name_kz' => 'Тәттілер',
            'name_en' => 'Sweets',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/sweets_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'К празднику',
            'name_kz' => 'Мереке үшін',
            'name_en' => 'For the holiday',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/for_the_holiday_mobile.svg',
        ]);
        Category::create([
            'name_ru' => 'Хозтовары',
            'name_kz' => 'Тұрмыстық тауарлар',
            'name_en' => 'Household goods',
            'desktop_image_url' => '',
            'mobile_image_url' => '/storage/categories/household_goods_mobile.svg',
        ]);
    }
}
