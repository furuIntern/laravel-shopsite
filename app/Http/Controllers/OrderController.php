<?php

namespace App\Http\Controllers;

use Auth;
use App\Orders;
use Illuminate\Http\Request;
use Session;
<<<<<<< HEAD
use App\Services\Cart\Facades\UseCart;
=======
use UseCart;
>>>>>>> master


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
<<<<<<< HEAD
=======
            
>>>>>>> master
        }
        catch(Expection $e) 
        {
            return 'Caught Expection: '. $e->getMessage();
        } 
            
        UseCart::destroy();
        
        return redirect()->route('product',['success' => 'success purchase products']);
              
    }
}
