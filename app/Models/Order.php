<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'shipping_address_id',
        'order_number',
        'status',
        'subtotal',
        'shipping_cost',
        'tax',
        'total',
        'currency',
        'notes',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    // Relationship: Order belongs to User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Order belongs to Address (shipping)
    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    // Relationship: Order has many OrderItems
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relationship: Order has one Payment
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    // Relationship: Order has one ShippingInfo
    public function shippingInfo(): HasOne
    {
        return $this->hasOne(ShippingInfo::class);
    }
}
