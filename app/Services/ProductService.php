<?php

namespace App\Services;

class ProductService
{

    public function transformProduct($products)
    {
        if ($products instanceof \Illuminate\Support\Collection || is_array($products)) {
            return $products->map(function ($product) {
                return $this->transformSingleProduct($product);
            })->all();
        }

        return $this->transformSingleProduct($products);
    }
    protected function transformSingleProduct($product)
    {
        return [
            'id' => $product->id,
            'photo_url' => $product->photo_url,
            'subcategory' => [
                'ru' => $product->subcategory->name_ru,
                'kz' => $product->subcategory->name_kz,
                'en' => $product->subcategory->name_en,
            ],
            'country' => $product->country->name,
            'brand' => $product->brand->name,
            'name_ru' => $product->name_ru,
            'name_kz' => $product->name_kz,
            'name_en' => $product->name_en,
            'description_ru' => $product->description_ru,
            'description_kz' => $product->description_kz,
            'description_en' => $product->description_en,
            'price' => $product->price,
            'discount' => $product->discount,
            'rating' => $product->rating,
        ];
    }
}
