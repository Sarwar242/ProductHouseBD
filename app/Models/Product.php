<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;
    protected $guarded = [];

    protected $fillable = [
        'product_name', 'product_code', 'product_price', 'product_details',
        'product_discount', 'product_quantity',
    ];

    public function searchableAs()
    {
        return 'product_name';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();



        return $array;
    }

    
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function slider()
    {
        return $this->hasOne(Slider::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}