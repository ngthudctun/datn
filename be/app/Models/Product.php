<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'product_name',
        'image',
        'description',
        'short_description',
        'slug',
        'status',
        'category_id',
        'brand_id',
        'created_at',
        'updated_at'
    ];
}
