<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public const MIN_SUM = 5000;
    public const MAX_COUNT = 3;

    protected $fillable = [
        'user_id',
        'order_status_id',
        'delivery_interval_id',
        'payment_type_id',
        'city_id',
        'address_street_and_house',
        'address_apartment',
        'address_entrance',
        'address_floor',
        'address_comment',
        'longitude',
        'latitude',
        'delivery_date',
        'products_price',
        'delivery_price',
        'total_price',
        'issuer',
        'cardMask'
    ];

    public function orderStatus(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function deliveryInterval(): BelongsTo
    {
        return $this->belongsTo(DeliveryInterval::class, 'delivery_interval_id');
    }

    public function paymentType(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot(['product_quantity', 'product_price', 'product_discount', 'product_price_with_discount']);
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(OrderAssignment::class, 'order_id');
    }

    public function warehousemanAssignment(): HasOne
    {
        return $this->hasOne(OrderAssignment::class, 'order_id')->where('role_id', 2);
    }

    public function courierAssignment(): HasOne
    {
        return $this->hasOne(OrderAssignment::class)->where('role_id', 3);
    }
}
