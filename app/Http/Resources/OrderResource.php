<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_status' => $this->orderStatus->name,
            'delivery_interval' => $this->deliveryInterval->name,
            'address' => $this->address,
            'address_comment' => $this->address_comment,
            'order_comment' => $this->order_comment,
            'delivery_date' => $this->delivery_date,
            'products' => $this->products->map(function ($product) {
                return [
                    'product_quantity' => $product->pivot->product_quantity,
                    'country' => $product->country->name,
                    'brand' => $product->brand->name,
                    'photo_url' => $product->photo_url,
                    'subcategory' => [
                        'ru' => $product->subcategory->name_ru,
                        'kz' => $product->subcategory->name_kz,
                    ],
                    'name' => [
                        'ru' => $product->name_ru,
                        'kz' => $product->name_kz,
                    ],
                    'description' => [
                        'ru' => $product->description_ru,
                        'kz' => $product->description_kz,
                    ],
                    'price' => $product->price,
                    'discount' => $product->discount,
                ];
            })->toArray(),
        ];
    }
}
