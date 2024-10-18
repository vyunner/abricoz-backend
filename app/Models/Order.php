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

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot(['product_quantity', 'product_price', 'product_discount']);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function assignments()
    {
        return $this->hasMany(OrderAssignment::class, 'order_id');
    }

    public function warehousemanAssignment()
    {
        return $this->hasOne(OrderAssignment::class, 'order_id')->where('role_id', 2);
    }

    public function courierAssignment()
    {
        return $this->hasOne(OrderAssignment::class)->where('role_id', 3);
    }
}
