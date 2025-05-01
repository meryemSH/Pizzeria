<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $featured = Blog::published()
        ->where('is_featured', true)
        ->first();

        $blogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->get();

        return view('blog.blog', compact('blogs','featured'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.blog-detail', compact('blog', 'blogs'));
    }

    public function edit(Blog $blog)
    {
        //
    }

    public function update(Request $request, Blog $blog)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
