<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productImage()
    {
        $this->hasOne(Product::class);
    }
}