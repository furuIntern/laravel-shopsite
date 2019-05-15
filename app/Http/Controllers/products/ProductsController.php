<?php

namespace App\Http\Controllers\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductsFilter;
use App\Products;
use App\Categories;
use App\Comment;
use Cart;
use App\Setting;

class ProductsController extends Controller
{
    //


    public function showProducts(Request $request) {
        $products = Products::Paginate(10);
        
        return view('shop\mainPage', $this->showShop($products));
    }

    public function category(Request $request) {
        
        $parent = Categories::find($request->id);
        
        $products = Products::ItemsCategory($parent)->paginate(10);
        
        return view('shop\showProduct', $this->showShop($products));
    }

    public function detailProduct(Request $request , $id) {

        $Product = Products::find($id);
        return view('shop\detailProduct' , [ 
                    'product' => $Product ,
                    'comments' => Comment::with('user')->where('product_id',$id)->paginate(10)
                ]);
    }

    public function filter(ProductsFilter $filter) {
        
    
        return view(
            'shop\showProduct', 
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

    protected function showShop($products)
    {
        return [
            'products' => $products,
            'items' => Cart::content(),
            'total' => Cart::total()
        ];
    }
}
