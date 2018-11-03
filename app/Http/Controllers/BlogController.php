<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function index() 
    {
        $posts = Post::all();
        //die('blog index');
        return view("blog.index", compact('posts')); 
    }
}
