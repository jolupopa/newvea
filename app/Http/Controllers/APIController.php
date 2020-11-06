<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProperty;
use App\Property;

class APIController extends Controller
{
    // Metodo para obtener todos los inmuebles destacados
    public function index()
    {
        $destacadas = Property::where('destacada', true )
            ->where('publicada', true )
            ->where('activa', true )
            ->with('type_property')
            ->get();
        return response()->json($destacadas); 
    }

    // Metodo para obtener todos los tipos de inmuebles
    public function types () 
    {
        $types = TypeProperty::all(); 
        return response()->json($types);
    }

    // Muestra las propiedades del tipo especifico
    public function type(TypeProperty $type_property)
    {
        $properties = Property::where('type_property_id', $type_property->id )
            ->where('destacada', true )
            ->where('publicada', true )
            ->where('activa', true )
            ->with('type_property')
            ->get();

        return response()->json($properties);
    }
    
}
