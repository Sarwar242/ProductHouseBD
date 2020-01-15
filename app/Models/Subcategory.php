<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'image', 'status',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}