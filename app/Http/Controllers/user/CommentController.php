<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    //

    public function showComment(Request $request)
    {
        if($request->route()->name('showComment'))
        {

<<<<<<< HEAD
            return view('comment',[ 'comments' => Comment::with('user')->paginate(10)]);
=======
            return view('comment',[ 'comments' => Comment::with('user')->where('product_id',)->paginate(10)]);
>>>>>>> master

        }
    }

    public function upComment(Request $request)
    {
        
        comment::create([
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'product_id' => $request->pro_id
        ]);

<<<<<<< HEAD
        return view('shop\showComment',[$comment => Comment::with('user')->paginate(10)]);
=======
        return view('shop\showComment',[$comment => Comment::with('user')->where('product_id',$request->pro_id)->paginate(10)]);
>>>>>>> master
    }
}
