<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {                      
        $title = '';
        if(request('category')) {
            $category = Category::where('slug', request('category'))->first();
            $title = 'in ' . $category;
        }

        if(request('author')) {
            $author = User::where('username', request('author'))->first();
            $title = 'by ' . $author;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",            
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $post,
            "active" => "posts",
        ]);
    }
}
