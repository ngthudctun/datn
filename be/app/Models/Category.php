<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['category_name', 'category_parent_id', 'image', 'slug', 'created_at', 'update_at'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
