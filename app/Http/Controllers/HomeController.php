<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {  
        if($request->ajax()) 
        {
            return view('user\element\table' , [ 
                'items' => Orders::findOrders(Auth::user()->id)->paginate(4)
            ]);
        }

        return view('home',[ 
                'items' => Orders::findOrders(Auth::user()->id)->paginate(4) 
            ]);
    }
}
