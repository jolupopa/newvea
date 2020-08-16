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
        $properties_user = Property::with(['type_property', 'distrito'])
            ->where('seller_id', $user->id)
            ->paginate();
        
        return view('admin.properties.index', [
            'properties' => $properties_user,
            'user' => $user,
            'type_properties' => $type_properties
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
            'destacada' => 'required'
            ]);
        
       
      
        $property =   Property::create([
            'codigo' => $user->id . Str::random(5),
            'title' => $request->get('title'),
            'operation'=> $request->get('operation'),
            'type_property_id' => $request->get('type_property_id'),
            'destacada' => $request->get('destacada'),
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
        $property = Property::findOrFail($id);
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
    public function update(Request $request, Property $property)
    {
        return $request;
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
