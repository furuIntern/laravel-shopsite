<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use App\Orders;
use Auth;

class UserController extends Controller
{
    //

    public function updateProfile(Request $request) {
        $data =  $request->all();

        user::update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address']
        ]);
    }
    
    public function showOrder() {
        
        return view('user\order\detail',[ 'orders' => Orders::where('user_id', Auth::user()->id)->paginate(5)]);

    }

    public function detailOrder($request) {
        
        return view('user\order\detail' , [ 'orders' => Orders::find($request->id)-paginate(5)]);
    }
}
