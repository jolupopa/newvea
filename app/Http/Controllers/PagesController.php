<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Seller;
use App\Sponsor;
use App\Property;
use App\Provincia;
use App\Departamento;
use App\Testimony;
use App\TypeProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;



class PagesController extends Controller
{

    public function home()
    {
       
      
      //usuarios para el grid
      $user_destacados = User::with('profile')->where('in_home', true)->get();

        // ciudades para el grid
        $cities = City::all();

        //$departamentos
        $departamentos = Departamento::all();

        // sponsors
        $sponsors = Sponsor::where('option', true)->get();

        //tipos de inmueble destacados con su cantidad
        $types = TypeProperty::withCount(['properties' => function(Builder $query){
            $query->where('destacada', true)
                    ->where('publicada', true);
        }])->get();

       // propiedades destacadas 
       $properties = Property::with(['city', 'profile', 'type_property', 'photos' => function($query){
           $query = $query->where('featured', 1);
       }])
        ->where('destacada', true)
        ->where('publicada', true)
        ->get();

       //testimonios
        $testimonies = Testimony::all();

        // para mostrar favoritos de usuario autenticado
        $autenticaded = Auth::check() ? True : False ;
        if( $autenticaded){
            $usuario = auth()->user();
        } else {
            $usuario = null;
        }
      
        
        return view('frontend.pages.home.index', [
            'properties' => $properties,
            'testimonies' => $testimonies,
            'cities' => $cities,
            'user_destacados'=> $user_destacados,
            'sponsors'=> $sponsors,
            'types' => $types,
            'autenticaded' => $autenticaded,
            'usuario' => $usuario,
            'departamentos' => $departamentos
            
        ]);
    }

    public function mapa()
    {
        return view('frontend.pages.mapa.index');
    }

    public function nosotros()
    {
        return view('frontend.pages.nosotros.index');
    }

    public function agentes()
    {
        return view('frontend.pages.agentes.index');
    }

   
    
 
          
}
