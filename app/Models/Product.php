<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'product_name', 'product_code', 'product_price', 'product_details',
        'product_discount', 'product_quantity',
    ];
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}