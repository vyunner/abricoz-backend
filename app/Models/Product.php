<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

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

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
