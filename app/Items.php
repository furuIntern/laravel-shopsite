<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart; 

class Items
{
    //

    public static function addCart($data) {
        
        $qty = $data['qty'] ? $data['qty'] : 1 ;
       
        $product = Products::find($data['id']);
              
        if($cart = Cart::content()->where('id', $data['id'])->first())
        {
                
            Cart::update($cart->rowId,['qty' => $cart->qty + $qty ]);
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

    public static function edit($id,$amount) {
         
        $rowId = Cart::content()->where('id', $id)->first()->rowId;
        
        Cart::update($rowId,[ 'qty' => $amount ]);
        
        return true;
    }

    public static function delete($id) {

        $rowId = Cart::content()->where('id', $id)->first()->rowId;

        Cart::remove($rowId);

        return true;
    }
}
