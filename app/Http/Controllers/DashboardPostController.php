<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images'); // store image to public/post-images
        $validatedData = $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required|min:5|unique:posts',
            'harga' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image1' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image2' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image3' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'body' => 'required|min:10',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if($request->file('image1')) {
            $validatedData['image1'] = $request->file('image1')->store('post-images');
        }
        if($request->file('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }
        if($request->file('image3')) {
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|min:5',
            'harga' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image1' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image2' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'image3' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:5024',
            'body' => 'required|min:10',
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|min:5|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if($request->file('image1')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image1'] = $request->file('image1')->store('post-images');
        }
        if($request->file('image2')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }
        if($request->file('image3')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post deleted successfully');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
