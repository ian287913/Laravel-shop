<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'img',
        'name',
        'price',
        'quantity',
    ];
}
