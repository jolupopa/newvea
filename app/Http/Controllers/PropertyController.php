<?php

namespace App\Http\Controllers;

use App\City;
use App\Profile;
use App\Distrito;
use App\Property;
use App\TypeProperty;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function by_city($id)
    {
        $types = TypeProperty::all(); 

        $properties = Property::with('type_property')->where('provincia_id', $id)->paginate();

        return view('frontend.pages.properties.by_cities',[
            'properties'=> $properties,
            'types' => $types
        ]);
    }

    public function show(Property $property)
    {
        $properties = Property::with(['photos', 'features', 'profile'])
        ->where('id', $property->id)->get();
        return view('frontend.pages.properties.detail',[
            'properties' => $properties
        ]);
    }

    public function by_promotor(Property $promotor)
    {
        $profile = Profile::findOrFail($promotor->id);
        $properties = Property::with('city')->where('seller_id', $promotor->id)
        ->where('publicada', true)
        ->where('activa', true)->paginate();
        return view('frontend.pages.properties.by_promotor',[
            'properties' => $properties,
            'profile' => $profile
        ]);
    }

    public function by_type(Request $request, $id)
    {
        if( $request->ajax())
        {
       $properties = Property::with(['city', 'profile'])
        ->where('destacada', true)
        ->where('publicada', true)
        ->where('type_property_id', $id)
        ->get();

        return response()->json($properties);
        
        

        }
    }
}
