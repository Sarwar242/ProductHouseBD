<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $fillable = [
        'name',
        'shipping_cost',
    ];
}