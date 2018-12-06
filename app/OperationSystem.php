<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSystem extends Model
{
    protected $table = 'OS';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasmany(Product::class);
    }
}
