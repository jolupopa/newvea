<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\TypeProperty;
use App\Property;
use App\Seller;

class OwlfilterController extends Controller
{
    public function show()
    {
        $cities = City::select()->orderBy('name')->get();
        $types = TypeProperty::all();

        $properties = Property::with(['city', 'profile', 'type_property'])
         ->where('destacada', true)
         ->where('publicada', true)
         ->get();
        return view('frontend.pages.owl',[
            'properties' => $properties,
           
            'cities' => $cities,
            
           
            'types' => $types
        ]);
    }
}
