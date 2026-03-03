<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
     protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'sku',
        'quantity',
        'is_sold',
        'main_image_url',
        'sort_order',
        'sold_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_sold' => 'boolean',
        'sold_at' => 'datetime',
    ];

    // Relationship: Product belongs to Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Product has many ProductImages
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relationship: Product has many OrderItems
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relationship: Product belongs to many Collections (many-to-many)
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'product_collection')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
