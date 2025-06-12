<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductVariantAttribute extends Pivot
{
    protected $table = 'product_variant_attribute';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'product_variant_id',
        'attribute_variant_id',
    ];
}
