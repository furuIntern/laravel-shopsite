<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    protected $setting;
    function __construct(){
        $this->setting = Setting::all()->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if($this->setting->sort_by == 'newest') {
            $products = Product::latest()->take(6)->get();
        } else {
            $products = Product::orderBy('sold', 'desc')
               ->take(6)
               ->get();
        }
        $categoryShowed = Category::where('show',true)->get();
        $categories = Category::where('show',false)->whereNull('parent_id')->get();
        return view('admin/setting',['products' => $products, 'categoryShowed' => $categoryShowed,'categories' => $categories]);
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
      
        $this->setting->description = $request->description;
        $this->setting->save();
        return redirect()->route('show-setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->setting->title = $request->title;
        $this->setting->save();
        return redirect()->route('show-setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function logo(Request $request){
        $request->validate([
            'logo'=>['required','image']
        ]);
        $request->file('logo')->storeAs(
            'public', 'logo.png'
        );
        return redirect()->route('show-setting');
    }
    public function sort(Request $request){
        $request->validate([
            'sortBy'=>['required_with:best sell,newest']
        ]);
        $this->setting->sort_product = $request->sortBy;
        $this->setting->save();
        return redirect()->route('show-setting');
    }
}
