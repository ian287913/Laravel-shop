<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    protected $table = 'sizetype';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasmany(Product::class);
    }

}
