<?php

namespace App\Http\Controllers\cart;

use App\Products;
use App\Items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //


    public function addCart(Request $request) {

        if(new Items($request->id)) {        
            //Cart::destroy();

            return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);
        }   
    }

    public function editCart(Request $request) {
        $Items = new Items;

        if($Items->edit($request->id, $request->amount)) {
            return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);
        }
    }

    public function itemsCart(Request $request) {
        if($request->route()->named('items')) {
            
            return view('cart\element\table',[ 
                'items' => Cart::content() , 
                'total' => Cart::total() , 
                'totalQty' => Cart::count()
                ]);
        }
    }
}
