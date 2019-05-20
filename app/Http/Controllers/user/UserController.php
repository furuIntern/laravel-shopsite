<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Orders;
use App\DetailOrder;
use Facades\UseCart;
use Cart;
use Auth;

class UserController extends Controller
{
    //
    private function user() {
        return User::find(Auth::user()->id);
    }

    public function showProfile(Request $request) {
        if($request->route()->name('profile')) {
            return view('user\profile',['user' => $this->user()]);
        }
    }
    public function upProfile(Request $request) {
        $data =  $request->all();
        
        try {
            User::where('id',Auth::user()->id)->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address']
            ]);

            return "Update Success";
        }
        catch(Exception $e) {
            
            return 'Caught Expection: '. $e->getMessage();
        }
    }
    

    public function detailOrder(Request $request) {
        
        return view('user\order\detail' , [ 
                'item' => Orders::find($request->id)->products()->get(),
                'id' => $request->id
            ]);
    }

    public function editOrder(Request $request, $id) 
    {
        UseCart::restore($id);
        
        return redirect()->route('detailCart',[
            'items' => dd(Cart::content()),
            'total' => UseCart::total()
        ]);
        
    }

    public function deleteOrder(Request $request)
    {

        Orders::where('id',$request->id)->delete();

        return view('user\element\table' , [ 
                'items' => Orders::findOrders(Auth::user()->id)->paginate(4)
            ]);

    }

   
    
}
