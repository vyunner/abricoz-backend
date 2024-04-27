<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'subcategory_id' => 1,
            'country_id' => 47,
            'brand_id' => 1,
            'name_ru' => 'Яблоки',
            'name_kz' => 'Алмалар',
            'name_en' => 'Apples',
            'description_ru' => 'Сочные и вкусные яблоки',
            'description_kz' => 'Суық және тәмсіз алмалар',
            'description_en' => 'Juicy and delicious apples',
            'price' => 100,
            'discount' => 10,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => 47,
            'brand_id' => 1,
            'name_ru' => 'Апельсины',
            'name_kz' => 'Апельсиндер',
            'name_en' => 'Oranges',
            'description_ru' => 'Сладкие и сочные апельсины',
            'description_kz' => 'Тәтті және суық апельсиндер',
            'description_en' => 'Sweet and juicy oranges',
            'price' => 120,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => 47,
            'brand_id' => 1,
            'name_ru' => 'Персики',
            'name_kz' => 'Шөпшіндер',
            'name_en' => 'Peaches',
            'description_ru' => 'Сладкие и сочные персики',
            'description_kz' => 'Тәтті және суық шөпшіндер',
            'description_en' => 'Sweet and juicy peaches',
            'price' => 150,
            'discount' => 8,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => 47,
            'brand_id' => 1,
            'name_ru' => 'Груши',
            'name_kz' => 'Анар',
            'name_en' => 'Pears',
            'description_ru' => 'Ароматные и сладкие груши',
            'description_kz' => 'Көкірегінен тәтті анар',
            'description_en' => 'Fragrant and sweet pears',
            'price' => 130,
            'discount' => 6,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => 47,
            'brand_id' => 1,
            'name_ru' => 'Абрикосы',
            'name_kz' => 'Қаймақтар',
            'name_en' => 'Apricots',
            'description_ru' => 'Сочные и ароматные абрикосы',
            'description_kz' => 'Суық және ароматты қаймақтар',
            'description_en' => 'Juicy and aromatic apricots',
            'price' => 110,
            'discount' => 12,
        ]);
    }
}
