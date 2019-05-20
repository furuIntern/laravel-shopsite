<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        $orders = Order::paginate(20);
        return view('admin\orderslist',['products'=>$products,'orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product.*'=>['required','exists:products,name'],
            'name'=>'required',
            'amount.*'=>['required','numeric','min:0'],
            'address'=>'required',
            'phone'=>'required',
        ]);
        $products = collect([]);
        $total = 0;
            foreach($request->input('product.*') as $key => $productName){
                $product = Product::where('name',$productName)->first();
                $OrderDetail = new OrderDetail;
                $OrderDetail->product_id=$product->id;
                $OrderDetail->amount=$request->input('amount.'.$key);
                $total += $product->price*$request->input('amount.'.$key);
                $product->amount -= $request->input('amount.'.$key);
                $products->push($OrderDetail);
            }

            $order = new Order;
            $order->name = $request->name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->total_price = $total;
            $order->save();
            $order->detail()->saveMany($products);
            return redirect()->route('show-orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $data = ['order'=>$order,'orderDetail'=>$order->detail];
        return view('admin/orderdetail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('show-orders');
    }

    /**
     * 
     * 
     * Update state
     */
    public function updateState(Order $order){
        $order->state = 'completed';
        $order->save();
        return redirect()->route('show-orders');
    }
}
