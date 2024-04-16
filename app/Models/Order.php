<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function deliveryInterval()
    {
        return $this->belongsTo(DeliveryInterval::class, 'delivery_interval_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot(['product_quantity', 'product_price', 'product_discount'])
            ->with('subcategory', 'country', 'brand');
    }
}
