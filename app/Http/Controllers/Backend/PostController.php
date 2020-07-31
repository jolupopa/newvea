<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;  
use App\Post;
use App\Tag;
use App\Category;

class PostController extends BaseBackendController
{
    public function index()
    {
        $this->authorize('view', new Post);
        if( auth('back')->user()->can('view', new Post))
        {
            $posts = Post::all();
        }
        else
        {
            $posts = auth('back')->user()->posts;
        }
       
       
        return view('backend.post.index', [
            'posts' => $posts
        ]);
    }


    public function create()

    {
        $this->authorize('create', new Post);
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.post.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }



    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        $this->validate($request, ['title' => 'required']);

        $url = Str::slug($request->get('title'), '-');

        $post =   Post::create([
                    'title' => $request->get('title'),
                    'url' => Post::where('url', 'LIKE', "{$url}%")->exists() ?   $url . Str::random(10) : $url ,
                    'administrator_id' =>  auth()->user()->id
                ]);       
        return redirect()->route('backend.posts.edit', $post);

    }


    public function edit(Post $post)
    {
        $this->authorize('update', $post);
       
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('backend.post.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
            ]);
    }


    public function update(Post $post, StorePostRequest $request)
    {    
        $this->authorize('update', $post);
        $post->title = $request->get('title');
        $url = Str::slug($post->title, '-');

        if(Post::where('url', 'LIKE', "{$url}%")->exists())
        {
            $url = $url . $post->id;
        } 
        
        $post->url = $url;
        $post->excerpt = $request->get('excerpt');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');

        $post->published_at =  $request->filled('published_at') ? Carbon::createFromFormat('d/m/Y', $request->get('published_at') )->format('Y-m-d H:i:s') : null ;
        
        $post->save();
        $post->tags()->sync($request->get('tags'));
        
        return redirect()->route('backend.posts.index')->with('flash', 'Tu publicacion ha sido guardada');
    }


    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->tags()->detach(); // borramos las tags de la tabla post_tag

        foreach( $post->photos as $photo)
        {
            Storage::disk('public')->delete($photo->url);
            $photo->delete();
        }

        $post->delete();

        return redirect()->route('backend.posts.index')->with('flash', 'Tu publicacion ha sido eliminada');

    }
}
