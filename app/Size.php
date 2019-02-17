<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
     protected $fillable = [
        'size',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'sizes';
}
