<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use App\TypeProperty;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Departamento;
use Illuminate\Validation\Rule;


class PropertyController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $type_properties = TypeProperty::all();
        $properties_user = Property::with(['type_property', 'photos' => function($query){
            $query = $query->where('featured' , 1);
        }])
            ->where('seller_id', $user->id)
            ->paginate();

      
       
         return view('admin.properties.index', [
            'properties' => $properties_user,
            'user' => $user,
            'type_properties' => $type_properties // uso en modal create

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'title'=> 'required',
            'operation' => 'required',
            'type_property_id' => 'required',
            ]);
        
       
      
        $property =   Property::create([
            'codigo' => $user->id . Str::random(5),
            'title' => $request->get('title'),
            'operation'=> $request->get('operation'),
            'type_property_id' => $request->get('type_property_id'),
            'seller_id' =>  Auth::user()->id
        ]);   

        return redirect()->route('admin.propiedad.edit', $property->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        $type_properties = TypeProperty::all();
        $departamentos = Departamento::all();
       
       
        return view('admin.properties.edit',[
            'property' => $property,
            'type_properties'=> $type_properties,
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = Property::find($id);

      

        $this->validate($request,
         [  
            'title'=> 'required',
            'detalle'=> 'required',
            'direccion'=> 'required',
            'precio' => 'required',
            'operation' => 'required',
            'name_distrito' => 'required',
            'name_provincia' => 'required',
            'name_departamento' => 'required',
            'departamento_id' => 'required',
            'provincia_id' => 'required',
            'distrito_id' => 'required',
            'type_property_id' => 'required',
            'num_cuartos' => 'nullable|between:1,5',
            'bathroon' => 'nullable|between:1,5',
            'midle_bathroon' => 'nullable|between:1,5',
            'num_cars' => 'nullable|between:1,5',
            'num_pisos' => 'nullable|integer',
            'area' => 'nullable|integer',
            'area_contruida' => 'nullable|integer',
            'year_build' => 'nullable|integer',
            'url_video' => 'nullable|url',
            'url_plano1' => 'nullable|string',
            'url_plano2' => 'nullable|string',
            'longitud' => 'nullable|string',
            'latitud' => 'nullable|string', 
            'en_estreno' => 'nullable',
            'en_parque' => 'nullable',
            'en_esquina' => 'nullable',
            'en_condominio' => 'nullable',
            'en_amoblado' => 'nullable',
            'en_avenida' => 'nullable',
            'en_provivienda' => 'nullable',
            'en_judicial' => 'nullable' 
            
        ]);

        
       
        $property->title = $request->get('title');
        $property->resumen = Str::limit( $request->get('detalle'), 200, ' (...)');
        $property->detalle = $request->get('detalle');
        $property->direccion = $request->get('direccion');
        $property->precio = $request->get('precio');
        $property->operation = $request->get('operation');
        $property->name_distrito = $request->get('name_distrito');
        $property->name_provincia = $request->get('name_provincia');
        $property->name_departamento = $request->get('name_departamento');
        $property->departamento_id = $request->get('departamento_id');
        $property->provincia_id = $request->get('provincia_id');
        $property->distrito_id = $request->get('distrito_id');
        $property->type_property_id = $request->get('type_property_id');
       
        $property->num_cuartos = $request->get('num_cuartos');
        $property->bathroon = $request->get('bathroon');
        $property->midle_bathroon = $request->get('midle_bathroon');
        $property->num_cars = $request->get('num_cars');
        $property->num_pisos = $request->get('num_pisos');
        $property->area = $request->get('area');
        $property->area_construida = $request->get('area_construida');
        $property->year_build = $request->get('year_build');
        $property->url_video = $request->get('url_video');
        $property->url_plano1 = $request->get('url_plano1');
        $property->url_plano2 = $request->get('url_plano2');
        $property->longitud = $request->get('longitud');
        $property->latitud = $request->get('latitud');
        $property->en_estreno = $request->get('en_estreno') == true ?  true : false;
        $property->en_parque = $request->get('en_parque') == true ?  true : false;
        $property->en_esquina = $request->get('en_esquina') == true ?  true : false;
        $property->en_condominio = $request->get('en_condominio') == true ?  true : false;
        $property->en_amoblado = $request->get('en_amoblado') == true ?  true : false;
        $property->en_avenida = $request->get('en_avenida') == true ?  true : false;
        $property->en_provivienda = $request->get('en_provivienda') == true ?  true : false;
        $property->en_judicial = $request->get('en_judicial') == true ?  true : false;
        
        $property->save();

        return redirect()->route('admin.propiedad.edit', $property->id )->withFlash('Se actulizo datos de la propiedad');

         

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
