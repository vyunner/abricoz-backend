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
        'desktop_image_url',
        'mobile_image_url',
        'name_kz',
        'name_ru',
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function desktopImagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => parse_url($this->desktop_image_url, PHP_URL_PATH)
        );
    }

    public function mobileImagePath(): Attribute
    {
        return Attribute::make(
            get: fn() => parse_url($this->mobile_image_url, PHP_URL_PATH)
        );
    }
}
