<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $fillable = [
        "title",
        "button_text",
        "button_link",
        "product_id",
        "priority",
        "image"];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}