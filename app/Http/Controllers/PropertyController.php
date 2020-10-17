<?php

namespace App\Http\Controllers;

use App\User;
use App\Distrito;
use App\Provincia;
use App\Property;
use App\TypeProperty;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function by_city($id)
    {
        $city = Provincia::find($id);
        $types = TypeProperty::all(); 

        $properties = Property::with(['type_property', 'photos' => function($query){
            $query = $query->where('featured', 1);
        }])->where('provincia_id', $id)->paginate();
      
        return view('frontend.pages.properties.by_cities',[
            'properties'=> $properties,
            'types' => $types,
            'city' => $city->name
        ]);
    }

    // detalle de inmueble
    public function show(Property $property)
    {
        //obtener si al ausuario le gusta la propiedad y si esta logueado
        $like = (auth()->user()) ?  auth()->user()->meGusta->contains( $property->id) : false;
        //obtener la cantidad de likes
        $likes = $property->likes->count();

        $user = User::find( $property->seller_id);
        $properties = Property::with(['photos', 'features', 'profile'])
        ->where('id', $property->id)->get();
       
        return view('frontend.pages.properties.detail',[
            'properties' => $properties,
            'user' => $user,
            'like' => $like,
            'likes' => $likes
        ]);
    }

    public function by_promotor($id_promotor)
    {
        
        $user = User::find($id_promotor);
        $distrito_user = Distrito::find($user->profile->id_distrito);
        $properties = Property::with( [ 'photos' => function($query){
            $query = $query->where('featured', 1);
        }] )->where('seller_id', $user->id)
        ->where('publicada', true)
        ->where('activa', true)->paginate();

        return view('admin.profile.profile', [
            "user" => $user,
            'properties' => $properties,
            'distrito'=> $distrito_user
        ]);
    }
   

    public function by_type(Request $request, $id)
    {
        if( $request->ajax())
        {
            $properties = Property::with(['profile', 'photos'])
                ->where('destacada', true)
                ->where('publicada', true)
                ->where('type_property_id', $id)
                ->get();

                return response()->json($properties);
                
        }
    }
}
