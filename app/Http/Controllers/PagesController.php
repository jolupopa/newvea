<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Testimony;
use App\Seller;
use App\City;
use App\User;
use App\Sponsor;
use App\TypeProperty;



class PagesController extends Controller
{

    public function home()
    {
       
       // return Seller::with('properties', 'profile')->get();
       // $sellers = Seller::has('properties')->get();
      $user_destacados = User::with('profile')->where('in_home', true)->get();

        $cities = City::select()->orderBy('name')->get();

        $sponsors = Sponsor::where('option', true)->get();

        $types = TypeProperty::all();

       $properties = Property::with(['city', 'profile', 'type_property'])
        ->where('destacada', true)
        ->where('publicada', true)
        ->get();

        $testimonies = Testimony::all();

        return view('frontend.pages.home.index', [
            'properties' => $properties,
            'testimonies' => $testimonies,
            'cities' => $cities,
            'user_destacados'=> $user_destacados,
            'sponsors'=> $sponsors,
            'types' => $types
        ]);
    }

   
    
 
          
}
