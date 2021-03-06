<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Orders;
use Facades\UseCart;



class OrderController extends Controller
{
    //


    protected function order() {
        
        return new Orders; 
    }
    
    public function submit(Request $request) {
        
        $request->validate([
                    'name' => 'required',
                    'phone' => 'required',
                    'address' => 'required'
                ]);
        
        try 
        {
            $id = UseCart::getStore($request->all(),Auth::user() ? Auth::user()->id :null);

            UseCart::getStoreProduct($this->order(),$id);
            
            $request->session()->forget('cart');

            if(!Auth::check())
            {
                return view('checkout\completeOrder')->with( 'key', Crypt::encryptString($id));
            }

            return ridirect()->route('index')->with( 'success', "Complete Order");
        }
        catch(Expection $e) 
        {
            return 'Caught Expection: '. $e->getMessage();
        }   
              
    }
}
