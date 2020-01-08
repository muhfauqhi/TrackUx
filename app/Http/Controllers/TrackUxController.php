<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Post;
use Storage;

class TrackUxController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(3)->get();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('trackux', compact('posts', 'products'));
    }
}
