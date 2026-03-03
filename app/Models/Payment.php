<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_method',
        'status',
        'amount',
        'currency',
        'stripe_payment_intent_id',
        'stripe_payment_method_id',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Relationship: Payment belongs to Order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
