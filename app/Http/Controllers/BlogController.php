<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index() 
    {
        $posts = Post::with('author')->latestFirst()->simplePaginate($this->limit);
        //die('blog index');
        return view("blog.index", compact('posts')); 
    }

    public function test() 
    {
        $posts = Post::all();
        //die('blog index');
        return view("blog.test", compact('posts')); 
    }

    
}
