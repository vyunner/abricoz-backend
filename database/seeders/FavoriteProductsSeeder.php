<?php

namespace Database\Seeders;

use App\Models\FavoriteProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoriteProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavoriteProduct::create(['user_id' => 1, 'product_id' => 1]);
        FavoriteProduct::create(['user_id' => 1, 'product_id' => 2]);
        FavoriteProduct::create(['user_id' => 1, 'product_id' => 3]);
        FavoriteProduct::create(['user_id' => 1, 'product_id' => 4]);
        FavoriteProduct::create(['user_id' => 1, 'product_id' => 5]);
    }
}
