<?php

namespace App\Http\Controllers\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductsFilter;
use App\Products;

class ProductsController extends Controller
{
    //


    public function showProducts(Request $request) {
        $products = Products::Paginate(10);
       
        return view('product\showProduct', [ 'products' => $products ]);
    }

    public function category(Request $request) {
        
        $products = Products::where('category_id', $request->id)->paginate(10);

        return view('product\showProduct', [ 'products' => $products]);
    }

    public function detailProduct(Request $request , $id) {

        $Product = Products::find($id);
        return view('product\detailProduct' , [ 'product' => $Product]);
    }

    public function filter(ProductsFilter $filter) {
        
    
        return view(
            'product\showProduct', 
                [
                    'products' => Products::ProductsFilter($filter)
                                            ->paginate(10)
                                            ->appends([ 
                                                'popular' => request('popular'),
                                                'price' => request('price'),
                                                'rangePrice' => request('rangePrice'),
                                                'time' => request('time')
                                            ])
                ]
        );
       

    }
}
