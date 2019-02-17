<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
     protected $fillable = [
        'product_id', 'thumbnail',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'product_images';
}
