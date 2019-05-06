<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    //

    public function submit(Request $request) {
        
        $request->validate([
                    'name' => 'required',
                    'phone' => 'required',
                    'address' => 'required'
                ]);
        $detail = new Orders; 

        if($id = Cart::store($request->all(),Auth::user() ? Auth::user()->id :null)) {
            foreach(Cart::content() as $item) {
                $detail->products()->syncWithoutDetaching([
                    $item->id => [
                        'order_id' => $id,
                        'amount' => $item->qty,
                        'price' => $item->price
                    ]
                ]);
            }
        Cart::destroy();
        return redirect()->route('index',['success' => 'success purchase products']);
            
        }
        
    }
}
