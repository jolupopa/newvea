<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        $postsrecently = Post::lastthre()->get();
        $categories = Category::withCount(['posts'])->get();
       
        return view('frontend.pages.blog.blog', [
            'category' => $category,
            'postsrecently' => $postsrecently,
            'categories' => $categories,
            'posts' => $posts
            
            ]);
    }
}
