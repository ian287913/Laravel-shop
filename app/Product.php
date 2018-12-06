<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'size',
        'cpu',
        'gpu',
        'ram',
        'storage',
        'description',
        'img',
        'category_id',
        'os_id',
        'tags',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
        return $this->belongsTo(OperationSystem::class);
    }

}
