<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use Illuminate\Http\Request;
use Session;
use UseCart;


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
            
        }
        catch(Expection $e) 
        {
            return 'Caught Expection: '. $e->getMessage();
        } 
            
        UseCart::destroy();
        
        return redirect()->route('product',['success' => 'success purchase products']);
              
    }
}
