<?php

namespace App\Http\Controllers\Backend;
use App\Post;
use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


use Illuminate\Http\Request;

class PhotosController extends  BaseBackendController
{
    public function store(Post $post)
    {

        $this->validate(request(), [
            'photo' => 'file|image|max:1024'

        ], [  
            'image' => 'Solo imagenes jpg, jpeg, png',
            'max' => 'Maximo tamaño 1 mega',
        ]);
       
        // retorna la url imagen temporal
        $photo = request()->file('photo');
        
        // Guarda en servidor dir:blog disk('public) 

        // con ext .jpeg retorna el nuevo url generado 
        $photoUrl = $photo->store('blog', 'public'); 

        //// tratamiento de imagen
        $image = Image::make(Storage::disk('public')->get($photoUrl))->resize(640,480)->encode();

        Storage::disk('public')->put($photoUrl,$image);

        $photoUrl = explode('/', $photoUrl);

        $photoUrl = $photoUrl[1];
        
   
        // gurdada en BD
        Photo::create([
            'url' => $photoUrl,
            'photoable_id' => $post->id,
            'photoable_type'=> 'App\Post'
        ]);
        
    }

    public function destroy(Photo $photo)
    {
        
        $photo->delete(); // elimina de BD

      
        Storage::disk('public')->delete($photo->url);
        
        return back()->with('flash', 'Foto eliminada');
    }
}
