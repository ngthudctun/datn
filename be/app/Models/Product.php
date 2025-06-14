<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'image',
        'description',
        'short_description',
        'slug',
        'status',
        'category_id',
        'brand_id',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class)
            ->whereDate('start_date', '<=', Carbon::now())
            ->whereDate('end_date', '>=', Carbon::now());
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getDiscountRateAttribute()
    {
        $discount = $this->discount;
        if (!$discount || $discount->discount_type !== 'percentage') {
            return 0;
        }
        return $discount->value;
    }


    public function getMinFinalPriceAttribute()
    {
        return $this->variants->min(fn ($variant) => $variant->final_price);
    }
}
