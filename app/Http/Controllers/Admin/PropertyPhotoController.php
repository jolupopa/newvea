<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\BaseAdminController;

class PropertyPhotoController extends BaseAdminController
{
    public function store($id)
    {

       $property = Property::find($id);

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
        $photoUrl = $photo->store('properties', 'public'); 

        //// tratamiento de imagen
        $image = Image::make(Storage::disk('public')->get($photoUrl))->resize(640,480)->encode();

        Storage::disk('public')->put($photoUrl,$image);

        $photoUrl = explode('/', $photoUrl);

        $photoUrl = $photoUrl[1];
        
   
        // gurdada en BD
        Photo::create([
            'url' => $photoUrl,
            'photoable_id' => $property->id,
            'photoable_type'=> 'App\Property'
        ]);
        
    }

    public function destroy(Photo $photo)
    {
        $property = Property::find($photo->photoable_id);
        $property->url_caratula = null;
        $property->save(); // elimina caratula
        
        $photo->delete(); // elimina foto de BD

      
        Storage::disk('public')->delete('properties/'. $photo->url);
        
        return back()->with('flash', 'Foto eliminada');
    }


    public function caratula(Photo $photo, $id)
    {
        $fotos = Photo::where('photoable_id', $id)
                        ->where('photoable_type' , 'App\Property')
                        ->get();
        $property = Property::find($id);              
       
        if( $fotos->count() >= 1)
        {
            foreach($fotos as $foto)
            {
               if( $foto->id == $photo->id )
               {
                   $foto->featured = 1 ;
                   $foto->save();
               }else{
                    $foto->featured = 0;
                    $foto->save();
            }
              
            }

            $property->url_caratula = $photo->url;
            $property->save();

        }
        
        return redirect()->route('admin.propiedad.edit', $id );
    }
}
