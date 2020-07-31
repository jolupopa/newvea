<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends BaseBackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Permission);
        $permissions = Permission::all();
        return view('backend.permissions.index',[
            'permisos' => $permissions
        ]);
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);
        return view('backend.permissions.edit',[
            'permiso' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);
        $data = $request->validate([
            'display_name' => 'required',
            'guard_name' => 'required'
             ]);

        $permission->update($data);
        
        return redirect()->route('backend.permissions.edit', $permission)->withFlash('El permiso a sido actualizado.');
    }

  
}
