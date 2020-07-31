<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Post extends Model
{
    protected $dates = ['published_at']; 

    protected $fillable = [
        'title', 'url', 'excerpt', 'body', 'readtime', 'category_id',
        'administrator_id', 'published_at'
    ];

    // sobreescribir metodo para cambiar campo=ID de retorno por defecto
    public function getRouteKeyName()
    {
        return 'url';
    }
    
    //protected $guarded = [];


    // queryscope
    public function scopePublished($query)
    {
      return   $query =  Post::whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at');
    }

    public function scopeLastthre($query)
    {
      return   $query =  Post::whereNotNull('published_at')
        ->where('published_at', '<=', Carbon::now())
        ->latest('published_at')->take(3);
    }
   

    public function isPublished()
    {
        return (bool) $this->published_at;
    }

    // relations
    public function category()
    {
        return $this->belongsTo(Category::class);
       
    }

    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function relatedPostsByTag()
    {
        return Post::whereHas('tags', function ($query) {
            $tagIds = $this->tags()->pluck('tags.id')->all();
            $query->whereIn('tags.id', $tagIds);
        })->where('id', '<>', $this->id)->get();
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function owner()
    {
        return $this->belongsTo(Administrator::class, 'administrator_id');
    }
}
