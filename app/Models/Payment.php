<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $guarded = [];
    public $fillable = [
        'name', 'image', 'priority', 'short_name', 'no', 'type',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}