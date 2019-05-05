<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order-detail';
    protected $fillable=[
        'product_id','order_id','amount'
    ];
}
