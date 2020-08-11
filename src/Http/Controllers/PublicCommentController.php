<?php

namespace Tir\Comment\Http\Controllers;

use Auth;

use Tir\Blog\Entities\Post;
use Tir\Comment\Entities\Comment;
use Illuminate\Routing\Controller;

class PublicCommentController extends Controller
{
    
    public function submit()
    {   

    
        // if(Auth::check()){
        //     $this->validate(request(),[
        //         'comment' => 'required',
        //     ]);
        //     $comment= auth()->user()->comments()->create(request()->all());
        // } else {
        //     $this->validate(request(),[
        //         'name' => 'required',
        //         'email' => 'required',
        //         'comment' => 'required',
        //     ]);
        // }
        
        $comment= Post::find('1')->comments()->create(request()->all());
        return $comment;

    }


}
