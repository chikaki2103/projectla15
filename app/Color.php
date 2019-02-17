<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
     protected $fillable = [
        'color', 'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'colors';
}
