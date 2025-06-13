<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_parent_id', 'image', 'slug', 'created_at', 'update_at'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
