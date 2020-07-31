<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // agrupa por fechas - partials
    public function archives()
    {
        return $archives = Post::selectRaw('year(published_at) year')
        ->selectRaw('month(published_at) month')
        ->selectRaw('monthname(published_at) monthname')
        ->selectRaw('count(*) posts')
        ->groupBy('year', 'month', 'monthname')
        ->orderBy('month', 'desc')
        ->get();
    }
    
    // listado de posts
    public function blog()  {    
        $query = Post::published()->with([
            'category','tags','administrator', 'photos']);

        if(request('month'))
        {
            $query->whereMonth('published_at', request('month'));
        }
        if(request('year'))
        {
            $query->whereYear('published_at', request('year'));
        }
     
        $posts = $query->paginate();
        
        $postsrecently = $posts->take(3);
        $categories = Category::withCount(['posts'])->get();
        return view('frontend.pages.blog.blog',[
            'posts' => $posts,
            'postsrecently' => $postsrecently,
            'categories' => $categories,
            'archives' => $this->archives()
            ]);
    }

    // mostrar un post
    public function post(Post $post)
    {
  
        $posts = Post::published()->get();
        $postsrecently = $posts->take(3);
        $categories = Category::withCount(['posts'])->get();
       
        if($post->isPublished() || auth('back')->check())
        {
        return view('frontend.pages.blog.detail', [
            'post' => $post,
            'postsrecently' => $postsrecently,
            'categories' => $categories,
            'archives' => $this->archives()
            ]);
        }    

        abort(404);
                
    }      

    //lista de post por categorias
    public function categories(Category $category)
    {
        $id = $category->id;
       
        $posts = Post::published()->with([
        'category' => function($query) use ($id){
            $query->where('id', $id); 
        },
        'tags','administrator', 'photos'
        ]);
        
        $categories = Category::withCount(['posts'])->get();
        $postsrecently = $posts->take(3);
        $posts = $posts->paginate();

        return view('frontend.pages.blog.by_category',[
            'title' => $category->name,
            'postsrecently' => $postsrecently,
            'categories' => $categories,
            'posts' => $posts,
            'archives' => $this->archives()      
            ]);

    }

    //lista de post por etiquetas
    public function tags(Tag $tag)
    {
        $postWithTag =  \DB::table('post_tag')->where('tag_id', $tag->id)->pluck('post_id');
            
        $posts = Post::published()->with('tags','category','administrator', 'photos' )
        ->whereIn('id', $postWithTag );

        $postsrecently = $posts->take(3); 
        $categories = Category::withCount(['posts'])->get();
        $posts = $posts->paginate();
        return view('frontend.pages.blog.by_tags',[
            'title' =>  $tag->name,
            'postsrecently' => $postsrecently,
            'categories' => $categories,
            'posts' => $posts,
            'tag' => $tag,
            'archives' => $this->archives() 
            ]);
    }

}
