<?php

namespace App\Http\Controllers\cart;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //


    public function addCart(Request $request) {
        if (!$request->has('id')) {
            
            return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);
        }
        else {
            $id = (int) $request->id;
        
            $amount = 1;
            $product = Products::find($id);
            
            $cart = Cart::content()->where('id', $id)->first();
            if(isset($cart))
            {
                $rowId = $cart->rowId;
                $qty = $cart->qty; 
                Cart::update($rowId,['qty' => ++$qty ]);
                return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]); 
            }
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $amount,
                'price' => $product->price * $amount
            ]);
            //Cart::destroy();
            $data = Cart::content();
            return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);;
        }
    }
}
