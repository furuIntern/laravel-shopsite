<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::whereNull('parent_id')->get();
        return view('admin\categorieslist',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:categories']
        ]);
        Category::create([
            'name'=> $request->name,
        ]);
        return redirect()->route('show-products');
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
            'parent_id'=>['required', Rule::exists('categories','id')->where(function ($query) {
                return $query->whereNull('parent_id');
            })],
            'name'=>['required','unique:categories']
        ]);
        Category::create([
            'name'=>$request->name,
            'parent_id'=> $request->parent_id
        ]);
        return redirect()->route('show-products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categories)
    {
        $category = $categories->category;
        return view('admin/categoryOption',['categories'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function display(){
        $categories=Category::whereNull('parent_id')->get();
        return view('admin\categoriesOption',['categories'=>$categories]);
    }
}
