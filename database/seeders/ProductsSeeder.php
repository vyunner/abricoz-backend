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
            'manufacturer' => 'ТОО "Abricoz", Казахстан',
            'name_ru' => 'Яблоки',
            'name_kz' => 'Алмалар',
            'name_en' => 'Apples',
            'description_ru' => 'Свежие, хрустящие и сочные яблоки, идеально подходят для перекусов и приготовления различных блюд. Богаты витаминами и клетчаткой, они поддержат ваш организм здоровым и полным энергии.',
            'description_kz' => 'Суық және тәмсіз алмалар',
            'description_en' => 'Juicy and delicious apples',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/a.apple.webp',
            'weight' => '1 кг',
            'calories' => 52,
            'proteins' => 0.3,
            'fats' => 0.2,
            'carbohydrates' => 14,
            'is_active' => 1,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'manufacturer' => 'ТОО "Abricoz", Казахстан',
            'name_ru' => 'Апельсины',
            'name_kz' => 'Апельсиндер',
            'name_en' => 'Oranges',
            'description_ru' => 'Сладкие и сочные апельсины, наполненные ярким цитрусовым вкусом. Отличный источник витамина C и антиоксидантов, которые укрепляют иммунитет и заряжают энергией на весь день.',
            'description_kz' => 'Тәтті және суық апельсиндер',
            'description_en' => 'Sweet and juicy oranges',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/a.apelsini.webp',
            'weight' => '1 кг',
            'calories' => 47,
            'proteins' => 0.9,
            'fats' => 0.1,
            'carbohydrates' => 12,
            'is_active' => 1,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'manufacturer' => 'ТОО "Abricoz", Казахстан',
            'name_ru' => 'Персики',
            'name_kz' => 'Шөпшіндер',
            'name_en' => 'Peaches',
            'description_ru' => 'Нежные и сладкие персики с ароматной мякотью, которые тают во рту. Эти фрукты не только вкусны, но и полезны, так как содержат витамины и антиоксиданты, поддерживающие молодость кожи.',
            'description_kz' => 'Тәтті және суық шөпшіндер',
            'description_en' => 'Sweet and juicy peaches',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/a.persiki.webp',
            'weight' => '1 кг',
            'calories' => 39,
            'proteins' => 0.9,
            'fats' => 0.3,
            'carbohydrates' => 10,
            'is_active' => 1,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'manufacturer' => 'ТОО "Abricoz", Казахстан',
            'name_ru' => 'Груши',
            'name_kz' => 'Анар',
            'name_en' => 'Pears',
            'description_ru' => 'Ароматные и сладкие груши, наполненные натуральной свежестью и сочностью. Этот фрукт содержит полезные микроэлементы и клетчатку, что делает его идеальным дополнением к вашему рациону.',
            'description_kz' => 'Көкірегінен тәтті анар',
            'description_en' => 'Fragrant and sweet pears',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/a.grushi.webp',
            'weight' => '1 кг',
            'calories' => 57,
            'proteins' => 0.4,
            'fats' => 0.1,
            'carbohydrates' => 15,
            'is_active' => 1,
        ]);

        Product::create([
            'subcategory_id' => 1,
            'manufacturer' => 'ТОО "Abricoz", Казахстан',
            'name_ru' => 'Абрикосы',
            'name_kz' => 'Қаймақтар',
            'name_en' => 'Apricots',
            'description_ru' => 'Сочные и ароматные абрикосы, которые дарят неповторимый вкус лета. Богаты витаминами, они поддерживают здоровье кожи и глаз, а также улучшают пищеварение.',
            'description_kz' => 'Суық және ароматты қаймақтар',
            'description_en' => 'Juicy and aromatic apricots',
            'price' => rand(200, 1500),
            'discount' => rand(0, 10),
            'photo_url' => '/storage/products/5.jpg',
            'weight' => '1 кг',
            'calories' => 48,
            'proteins' => 1.4,
            'fats' => 0.4,
            'carbohydrates' => 11,
            'is_active' => 1,
        ]);

        $products = Product::all();
        foreach ($products as $product) {
            $discountedPrice = $product->price - ($product->price * $product->discount / 100);
            $product->price_with_discount = $discountedPrice;
            $product->save();
        }
    }
}
