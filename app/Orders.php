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
        return $this->belongsToMany('App\Products','detail_orders','order_id','product_id');
    }

    public function scopeFind($query,$id) {

        $query->where('user_id', $id)
              ->where('status', null);
        
        if($query) {
            return true;
        }

        return false;
    }

}
