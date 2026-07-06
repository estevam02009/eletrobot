<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'sku',
        'barcode',
        'model',
        'name',
        'description',
        'price',
        'stock',
        'voltage',
        'warranty',
        'weight',
        'dimensions',
        'featured',
        'promotion',
        'active',
        'image'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
