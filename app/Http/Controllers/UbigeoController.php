<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\Zona;
class UbigeoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('frontend.pages.ubigeo', [
            'departamentos' => $departamentos
        ]);
    }

    public function getProvincias(Request $request, $id){

        if( $request->ajax() )
        {
            $provincias = Provincia::where('departamento_id', $id)->get();
            return response()->json( $provincias);
        }
    }

    public function getDistritos(Request $request, $id){

        if( $request->ajax() )
        {
            $distritos = Distrito::where('provincia_id', $id)->get();
            return response()->json( $distritos);
        }
    }

    public function getZonas(Request $request, $id){

        if( $request->ajax() )
        {
            $zonas = Zona::where('city_id', $id)->get();
            return response()->json( $zonas);
        }
    }

   
}
