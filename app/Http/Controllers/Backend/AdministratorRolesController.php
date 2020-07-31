<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Administrator;

class AdministratorRolesController extends BaseBackendController
{
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrator $administrator)
    {
        //syncRoles metodo de laravel-permission :elimina todos los roles del usuario y le asigna los seleccionados
         $administrator->syncRoles($request->roles);
        return back()->withFlash('Los roles han sido actualizados.');
    }

   
}
