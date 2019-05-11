<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //

    public function showComment(Request $request)
    {
        if($request->route()->name('showComment'))
        {

            return view('comment',[ 'comments' => Comment::paginate(10)]);

        }
    }

    public function upComment(Request $request)
    {

        
        User::comment()->syncWithoutDetach( [ $id => [
            'content' => $request->content,
            'product_id' => $request->pro_id
        ]]);

    }
}
