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

        if(Items::addCart($request->id)) {        
            //Cart::destroy();

            return view('cart\show',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);
        }   
    }

    public function editCart(Request $request) {
        
        $item = $request->all();
        if(Items::edit($item['id'],$item['qty'])) {
            return view('cart\element\table',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]);
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

    public function deleteItem(Request $request) {
        
        if(Items::delete($request->id)) {
            return view('cart\element\table',['items' => Cart::content() , 'total' => Cart::total() , 'subtotal' => Cart::subtotal()]); 
        }
    }

    
}
