<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable=[
        'name','phone','address'
    ];
    public function detail(){
        return $this->hasMany('App\OrderDetail');
    }
}
