<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailOrder extends Model
{
    //

    protected $fillable = [
        'id' , 'user_id', 'order_id'
    ];
}
