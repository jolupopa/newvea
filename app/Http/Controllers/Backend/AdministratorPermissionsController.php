<?php

namespace App\Http\Controllers\Backend;

use App\Administrator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministratorPermissionsController extends BaseBackendController
{
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        // dd($request->permisos);
         
        //syncRoles metodo de laravel-permission :elimina todos los roles del usuario y le asigna los seleccionados
          $administrator->syncPermissions($request->permisos);
          return back()->withFlash('Los permisos han sido actualizados.');
    }

   
}
