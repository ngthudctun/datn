<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'image_url',
    ];

    // 🔗 Mối quan hệ: mỗi ảnh thuộc về một product variant
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
