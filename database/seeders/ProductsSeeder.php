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
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Яблоки',
            'name_kz' => 'Алмалар',
            'name_en' => 'Apples',
            'description_ru' => 'Сочные и вкусные яблоки',
            'description_kz' => 'Суық және тәмсіз алмалар',
            'description_en' => 'Juicy and delicious apples',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/1.jpg',
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Апельсины',
            'name_kz' => 'Апельсиндер',
            'name_en' => 'Oranges',
            'description_ru' => 'Сладкие и сочные апельсины',
            'description_kz' => 'Тәтті және суық апельсиндер',
            'description_en' => 'Sweet and juicy oranges',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/2.jpg',
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Персики',
            'name_kz' => 'Шөпшіндер',
            'name_en' => 'Peaches',
            'description_ru' => 'Сладкие и сочные персики',
            'description_kz' => 'Тәтті және суық шөпшіндер',
            'description_en' => 'Sweet and juicy peaches',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/3.webp',
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Груши',
            'name_kz' => 'Анар',
            'name_en' => 'Pears',
            'description_ru' => 'Ароматные и сладкие груши',
            'description_kz' => 'Көкірегінен тәтті анар',
            'description_en' => 'Fragrant and sweet pears',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/4.webp',
        ]);

        Product::create([
            'subcategory_id' => 1,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Абрикосы',
            'name_kz' => 'Қаймақтар',
            'name_en' => 'Apricots',
            'description_ru' => 'Сочные и ароматные абрикосы',
            'description_kz' => 'Суық және ароматты қаймақтар',
            'description_en' => 'Juicy and aromatic apricots',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/5.jpg',
        ]);

        Product::create([
            'subcategory_id' => 2,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Томаты',
            'name_kz' => 'Томаттар',
            'name_en' => 'Tomatoes',
            'description_ru' => 'Спелые и сочные томаты, идеальны для салатов',
            'description_kz' => 'Пісіп-жетілген және шырынды томаттар, салаттар үшін тамаша',
            'description_en' => 'Ripe and juicy tomatoes, perfect for salads',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/6.jpg',
        ]);

        Product::create([
            'subcategory_id' => 2,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Огурцы',
            'name_kz' => 'Қияр',
            'name_en' => 'Cucumbers',
            'description_ru' => 'Свежие и хрустящие огурцы, идеально подходят для закусок',
            'description_kz' => 'Жаңа және дәмді қиярлар, гарнирлер үшін өте жақсы',
            'description_en' => 'Fresh and crunchy cucumbers, great for snacks',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/7.webp',
        ]);

        Product::create([
            'subcategory_id' => 2,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Баклажаны',
            'name_kz' => 'Көкөніс',
            'name_en' => 'Eggplants',
            'description_ru' => 'Темные и мягкие баклажаны, отлично подходят для запекания',
            'description_kz' => 'Қара және жұмсақ көкөністер, пісіру үшін қолайлы',
            'description_en' => 'Dark and soft eggplants, perfect for baking',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/8.jpg',
        ]);

        Product::create([
            'subcategory_id' => 3,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Укроп',
            'name_kz' => 'Өсімдік',
            'name_en' => 'Dill',
            'description_ru' => 'Ароматный укроп, идеальный для супов и салатов',
            'description_kz' => 'Хош иісті өсімдік, сорпалар мен салаттар үшін тамаша',
            'description_en' => 'Fragrant dill, perfect for soups and salads',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/9.jpg',
        ]);

        Product::create([
            'subcategory_id' => 3,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Петрушка',
            'name_kz' => 'Петрушка',
            'name_en' => 'Parsley',
            'description_ru' => 'Свежая петрушка, насыщенная витаминами',
            'description_kz' => 'Жаңа петрушка, витаминдерге бай',
            'description_en' => 'Fresh parsley, rich in vitamins',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/10.jpg',
        ]);

        Product::create([
            'subcategory_id' => 3,
            'country_id' => rand(1, 10),
            'brand_id' => 1,
            'name_ru' => 'Базилик',
            'name_kz' => 'Базилик',
            'name_en' => 'Basil',
            'description_ru' => 'Ароматный базилик, отлично подходит для пиццы и пасты',
            'description_kz' => 'Хош иісті базилик, пицца және паста үшін өте жақсы',
            'description_en' => 'Fragrant basil, great for pizza and pasta',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/11.jpg',
        ]);

        $products = Product::all();
        foreach ($products as $product) {
            $discountedPrice = $product->price - ($product->price * $product->discount / 100);
            $product->price_with_discount = $discountedPrice;
            $product->save();
        }
    }
}
