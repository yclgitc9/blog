<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index() 
    {
        // $categories = Category::with([ 'posts' => function($query) {
        //     $query->published();
        // }])->orderBy('title', 'asc')->get();
        // die($categories);

        $posts = Post::with('author')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts')); 
    }

    public function category(Category $category) 
    {
        $categoryName = $category->title;


        // $categories = Category::with(['posts' => function($query) {
        //     $query->published();
        // }])->orderBy('title', 'asc')->get();
        // die($categories);

        // $posts = Post::with('author')
        //                 ->latestFirst()
        //                 ->published()
        //                 ->where('category_id', $id)
        //                 ->simplePaginate($this->limit);

        $posts = $category->posts()
                            ->with('author')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts', 'categoryName')); 
    }

    public function author(User $author) 
    {
        $authorName = $author->name;

        $posts = $author->posts()
                            ->with('category')
                            ->latestFirst()
                            ->published()
                            ->simplePaginate($this->limit);
        
        return view("blog.index", compact('posts', 'categoryName'));
        // dd($author->name);
    }

    public function show(Post $post)
    {
        return view("blog.show", compact('post'));
    }

    public function test() 
    {
        $posts = Post::all();
        //die('blog index');
        return view("blog.test", compact('posts')); 
    }

    
}
