<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index() 
    {
        $categories = Category::with([ 'posts' => function($query) {
            $query->published();
        }])->orderBy('title', 'asc')->get();
        // die($categories);

        $posts = Post::with('author')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts', 'categories')); 
    }

    public function category($id) 
    {
        $categories = Category::with(['posts' => function($query) {
            $query->published();
        }])->orderBy('title', 'asc')->get();
        // die($categories);

        $posts = Post::with('author')
                        ->latestFirst()
                        ->published()
                        ->where('category_id', $id)
                        ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts', 'categories')); 
    }

    public function show(Post $post)
    {
        // die("show");
        // $post = Post::published()->findOrFail($id);
        return view("blog.show", compact('post'));
    }

    public function test() 
    {
        $posts = Post::all();
        //die('blog index');
        return view("blog.test", compact('posts')); 
    }

    
}
