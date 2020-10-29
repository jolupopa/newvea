<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Property;

class SearchController extends Controller
{
    // resultado de busqueda
    public function index(Request $request){
        //return $request;
       
        $query = Property::where('operation', $request->get('tab'));
       
        if(request('palabra') )
        {
           
            $query->where('distrito_id', $request->get('_distrito_id') )
                    ->where('name_zona', $request->get('_zona') );
        }

        if(request('tipo') )
        {
            $query->where('type_property_id', $request->get('tipo'));
        }

        if(request('precio') )
        {
            $query->where('precio', '<=', $request->get('precio'));
        }

        if(request('cuartos') )
        {
            $query->where('num_cuartos', '=', $request->get('cuartos'));
        }
        if(request('banos') )
        {
            $query->where('bathroon', '=', $request->get('banos'));
        }

        if(request('garaje') )
        {
            $query->where('num_cars', '=', $request->get('garaje'));
        }

        if(request('b_estreno') )
        {
            $query->where('en_estreno', true );
        }
        if(request('b_parque') )
        {
            $query->where('en_parque', true );
        }
        if(request('b_esquina') )
        {
            $query->where('en_esquina', true );
        }
        if(request('b_condo_privado') )
        {
            $query->where('en_condominio', true );
        }
        if(request('b_amoblado') )
        {
            $query->where('en_amoblado', true );
        }
        if(request('b_avenida') )
        {
            $query->where('en_avenida', true );
        }
        if(request('b_prog_vivienda') )
        {
            $query->where('en_provivienda', true );
        }
        if(request('b_remate') )
        {
            $query->where('en_judicial', true );
        }

        //return $query->get();
       

       

        if( $request->get('dist') != 0 )
        {   
            $query->where('distrito_id',  $request->get('dist') );
        }else 
        {
            if( $request->get('prov') != 0 )
            {
                $query->where('provincia_id',  $request->get('prov') );
            } else 
            {
                if( $request->get('depa') != 0 )
                {
                    $query->where('departamento_id',  $request->get('depa') );
                }

            }

        }

       




        $properties = $query->get();
        
        return $properties;

       

    }

    // procesa autocompletado para buscar por palabra clave
    public function ubicacion(Request $request)
    {
        $term  = $request->get('term');
        $querys = Property::where('search_filter', 'LIKE', '%' . $term . '%')->get();
        $data = [];
        
        foreach($querys as $query)
        {
            $ubigeo = $query->distrito_id . $query->provincia_id . $query->departamento_id .  Str::slug( $query->name_zona , '-');;

            $data[] = ['label' => $query->search_filter, 'ubigeo'=> $ubigeo, 'zona'=> $query->name_zona, 'distrito_id' => $query->distrito_id ]; 

        }

        $data = $this->unique_multidim_array($data,'ubigeo');
     
      
        return $data;
       
    }
    //elimina duplicados en array por un campo o key
    public function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
       
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
   
}
