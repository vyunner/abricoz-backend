<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'mobile_image_url',
        'name_kz',
        'name_ru',
        'is_active',
        'priority_number',
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id')
            ->orderBy('priority_number', 'DESC');
    }

    public function mobileImagePath(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->mobile_image_url, PHP_URL_PATH)
        );
    }
}
