<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailOrder extends Model
{
    //

    protected $fillable = [
        'order_id' , 'amount', 'price', 'tax', 'rowId'
    ];
}
