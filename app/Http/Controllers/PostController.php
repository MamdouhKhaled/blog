<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {

        $post = Post::with('category')->with('comments')->find($id);
        $categories = Category::all();
        return view('front.post')->withPost($post)->withCategories($categories);
    }
}
