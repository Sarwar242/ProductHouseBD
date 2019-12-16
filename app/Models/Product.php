<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_code', 'product_code');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}