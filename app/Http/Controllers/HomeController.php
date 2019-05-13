<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Orders;
use Auth;
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5

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
<<<<<<< HEAD

=======
    
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
<<<<<<< HEAD
    public function index()
    {
        return view('home');
=======
    public function index(Request $request)
    {  
        if($request->ajax()) 
        {
            return view('user\element\table' , $this->items());
        }

        return view('home', $this->items());
    }

    private function items()
    {
        return array( 
            'items' => Orders::findOrders(Auth::user()->id)->paginate(4)
        );
>>>>>>> c9f15990e17e19dced6683e8e892b9c44d964ae5
    }
}
