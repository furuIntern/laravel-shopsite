<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin/productslist',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewProductRequest $request)
    {
        // public/ImageProduct/image
        $product = Product::create([
            'name' => $request->name,
            'price'=> $request->price,
            'amount'=> $request->amount,
            'category_id'=> $request->category
        ]);
        $request->file('img')->storeAs('public/ImageProduct',$product->id.'.png');
        return redirect()->route('show-products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin\productdetail',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)
    {
        $request->validate([
            'img'=>'image',
            'price'=>['required','min:0','numeric'],
            'amount'=>['required','min:0','numeric']
        ]);
        if($request->file('img')){
            $request->file('img')->storeAs('public/ImageProduct',$product->id.'.png');
        }
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('show-products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'amount'=> 'required|numeric|min:0'
        ]);
        $product->amount = $request->amount;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}
