<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Seller;
use App\Sponsor;
use App\Property;
use App\Provincia;
use App\Testimony;
use App\TypeProperty;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class PagesController extends Controller
{

    public function home()
    {
       
       // return Seller::with('properties', 'profile')->get();
       // $sellers = Seller::has('properties')->get();
      $user_destacados = User::with('profile')->where('in_home', true)->get();
        $cities = Provincia::where('selection', true)
        ->orderBy('name', 'asc')->get();
      

        $sponsors = Sponsor::where('option', true)->get();

        $types = TypeProperty::withCount(['properties' => function(Builder $query){
            $query->where('destacada', true)
                    ->where('publicada', true);
        }])->get();

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
