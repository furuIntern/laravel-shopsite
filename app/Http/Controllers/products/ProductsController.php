<?php

namespace App\Http\Controllers\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Categories;
use App\Comment;
use App\Orders;
use App\ProductsFilter;
use Cart;
use App\Setting;
use Illuminate\Support\Facades\Crypt;

class ProductsController extends Controller
{
    //


    public function showProducts(Request $request) {
        $products = Products::Paginate(10);
        
        return view('shop\mainPage', $this->showShop($products));
    }

    public function category(Request $request) {
        
        if($request->route()->name('product'))
        {
            $parent = Categories::find($request->id);
        
            $products = Products::ItemsCategory($parent)->paginate(10);
        
            return view('shop\showProduct', $this->showShop($products));
        }
    }

    public function detailProduct(Request $request , $id) {

        $Product = Products::find($id);
        return view('shop\detailProduct' , $this->showShop(
            $Product,
            Comment::with('user')->where('product_id',$id)->paginate(10)
        ));
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

    public function orderGuest(Request $request)
    {
        if($request->route()->name('orderGuest'))
        {
            return view('shop\orderGuest',$this->showShop());
        }

    }

    public function showOrderGuest(Request $request)
    {

        try {
            
            return view('shop\orderGuest\order',[ 
                'order' => Orders::where('id',$this->decrypted($request->id))->orderGuest()->get()
            ]);

        } catch (DecryptException $e) {
            
        }
    }

    public function showDetailOrderGuest(Request $request)
    {
        try {
            
            return view('shop\orderGuest\detail', [
                'items' => Orders::find($this->decrypted($request->id))->products()->get()
            ]);

        } catch (DecryptException $e) {
            
        }
        
    }

    public function deleteOrderGuest(Request $request)
    {
        try {
                
            Orders::find($this->decrypted($request->id))->delete();

        } catch (DecryptException $e) {
            
        }
    }

    protected function decrypted($cryp)
    {
        return Crypt::decryptString($cryp);
    } 

    protected function showShop($products = NULL, $comment = NULL)
    {
        return [
            'products' => $products,
            'comments' => $comment,
            'items' => Cart::content(),
            'total' => Cart::total()
        ];
    }
}
