<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    
    protected $fillable= [
        'name' , 'address' , 'phone','total_amount', 'total_price'
    ];

    public function products() {
        return $this->belongsToMany('App\Products','detail_orders','order_id','product_id')
                    ->withPivot('amount','price','tax');
    }

    public function scopeFindOrders($query,$id) {

        $query->where('user_id', $id);
              
        
        return $query;
    }

}
