<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShippingInfo extends Model
{
    protected $fillable = [
        'order_id',
        'carrier',
        'tracking_number',
        'shipping_method',
        'recipient_name',
        'recipient_surname',
        'recipient_email',
        'recipient_phone',
        'recipient_address',
        'weight',
        'package_size',
        'shipped_at',
        'delivered_at',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    // Relationship: ShippingInfo belongs to Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
