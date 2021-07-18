<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $posts = Post::OrderBy('created_at', 'desc')
            ->with('category')
            ->withCount('comments')
            ->paginate(5);
        $categories = Category::all();
        return view('front.blog')->withPosts($posts)->withCategories($categories);
    }

    public function search(Request $request)
    {
        $keyword = trim($request->get('q'));
        $posts = Post::where('title', 'like', "%{$keyword}%")
            ->orWhere('content', 'like', "%{$keyword}%")
            ->OrderBy('created_at', 'desc')
            ->with('category')
            ->withCount('comments')
            ->paginate(5);
        $categories = Category::all();
        return view('front.search')->withPosts($posts)->withCategories($categories);
    }
}
