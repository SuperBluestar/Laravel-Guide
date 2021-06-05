<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{
    //// Test
    public function commentPost()
    {

        $allposts = Post::with('comments')->get();

        return view('index',compact('allposts'));

    }
}
