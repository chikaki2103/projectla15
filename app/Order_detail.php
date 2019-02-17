<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
     protected $fillable = [
        'order_id', 'product_detail_id','product_id','product_code','quantity','price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'order_details';
}
