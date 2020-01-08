<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Storage;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:post-create|post-edit|post-delete', ['only' => ['index','show']]);
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        $categories = Category::pluck('name','id')->all();
        $select = $post->category->id;

        // dd($select);
        return view('posts.edit', compact('post', 'categories', 'select'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        

        $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'content' => request('content')
        ]);

        return redirect()->route('posts.index')->with('success', 'Post edited successfully');
    }
    
    public function create()
    {   
        $categories = Category::pluck('name','id')->all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // dd($request->all());

        Post::create([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id')
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.'); 
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
