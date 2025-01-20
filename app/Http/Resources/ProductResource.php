<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'photo_url' => $this->photo_url,
            'subcategory' => [
                'ru' => $this->subcategory->name_ru,
                'kz' => $this->subcategory->name_kz,
            ],
            'country' => $this->country->name,
            'brand' => $this->brand->name,
            'name_ru' => $this->name_ru,
            'name_kz' => $this->name_kz,
            'description_ru' => $this->description_ru,
            'description_kz' => $this->description_kz,
            'price' => $this->price,
            'discount' => $this->discount,
        ];
    }
}
