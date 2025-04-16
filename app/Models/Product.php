<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'photo_url',
        'where',
        'manufacturer',
        'name_kz',
        'name_ru',
        'description_kz',
        'description_ru',
        'weight',
        'calories',
        'proteins',
        'fats',
        'carbohydrates',
        'price',
        'discount',
        'price_with_discount',
        'price_cost',
        'total_sales',
        'amount',
        'stock_quantity',
        'is_active',
    ];

    public function active(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->is_active === 1,
        );
    }

    public function inactive(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->is_active !== 1,
        );
    }

    public function photoPath(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->photo_url, PHP_URL_PATH)
        );
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }
}
