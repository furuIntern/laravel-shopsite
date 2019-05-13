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

    protected function getCart() {
        $data = [
            'items' => Cart::content(),
            'total' => Cart::total(),
            'subtotal' => Cart::subtotal()
        ];

        return $data;
    }

    public function addCart(Request $request) {

        if(Items::addCart($request->id,$request->qty)) {        

            return view('cart\show',$this->getCart());
            
        }   
    }

    public function showCart(Request $request) {
        if($request->route()->name('detailCart')) {
            return view('cart\detailCart',$this->getCart());
        }
    }

    public function editCart(Request $request) {
        
        $item = $request->all();
        if(Items::edit($item['id'],$item['qty'])) {
            return view('cart\element\table',$this->getCart());
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
