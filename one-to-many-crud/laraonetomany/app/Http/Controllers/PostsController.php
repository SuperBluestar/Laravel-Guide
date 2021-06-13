<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index()
    {

        $allposts = Post::with('comments')->get();

        return view('posts/index',compact('allposts'));

    }

    public function create()
    {
        return view('posts/create');
    }
}
