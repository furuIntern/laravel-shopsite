<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart; 

class Items
{
    //

    function __construct($id) {
        $qty = 1;
        $product = Products::find($id);
            
            
        if($cart = Cart::content()->where('id', $id)->first())
        {
                
           
            Cart::update($cart->rowId,['qty' => ++$cart->qty ]);
            return true;
        }
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price * $qty
        ]);

        return true;
    }

    public function edit($id,$amount) {
        
        $cart = Cart::content()->where('id', $id)->first();
        
        Cart::updata($cart->rowId,[ 'qty' => $amount ]);
        
        return true;
    }
}
