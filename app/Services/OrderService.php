<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OrderService
{
    public function transformOrder($order)
    {
        return [
            'id' => $order->id,
            'order_status' => $order->orderStatus->name,
            'delivery_interval' => $order->deliveryInterval->name,
            'address' => $order->address,
            'address_comment' => $order->address_comment,
            'order_comment' => $order->order_comment,
            'delivery_date' => $order->delivery_date,
            'products' => $order->products->map(function ($product) {
                return [
                    'product_quantity' => $product->pivot->product_quantity,
                    'country' => $product->country->name,
                    'brand' => $product->brand->name,
                    'photo_url' => $product->photo_url,
                    'subcategory' => [
                        'ru' => $product->subcategory->name_ru,
                        'kz' => $product->subcategory->name_kz,
                        'en' => $product->subcategory->name_en,
                    ],
                    'name' => [
                        'ru' => $product->name_ru,
                        'kz' => $product->name_kz,
                        'en' => $product->name_en,
                    ],
                    'description' => [
                        'ru' => $product->description_ru,
                        'kz' => $product->description_kz,
                        'en' => $product->description_en,
                    ],
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'rating' => $product->rating,
                ];
            })->toArray(),
        ];
    }
}
