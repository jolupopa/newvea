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
use Illuminate\Support\Facades\Auth;
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

        $likes = 
      

        $sponsors = Sponsor::where('option', true)->get();

        //filtra tipo inmueble destacados
        $types = TypeProperty::withCount(['properties' => function(Builder $query){
            $query->where('destacada', true)
                    ->where('publicada', true);
        }])->get();

       $properties = Property::with(['city', 'profile', 'type_property', 'photos' => function($query){
           $query = $query->where('featured', 1);

       }])
        ->where('destacada', true)
        ->where('publicada', true)
        ->get();
       
        $testimonies = Testimony::all();

        $autenticaded = Auth::check() ? True : False ;

        if( $autenticaded){
            $usuario = auth()->user();
            
        } else {
            $usuario = null;
        }
        //obtener si al ausuario le gusta la propiedad y si esta logueado
        $like = (auth()->user()) ?  true : false;

      
        
        return view('frontend.pages.home.index', [
            'properties' => $properties,
            'testimonies' => $testimonies,
            'cities' => $cities,
            'user_destacados'=> $user_destacados,
            'sponsors'=> $sponsors,
            'types' => $types,
            'autenticaded' => $autenticaded,
            'usuario' => $usuario,
            'like' => $like
            
        ]);
    }

   
    
 
          
}
