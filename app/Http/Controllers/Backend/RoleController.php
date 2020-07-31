<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\SaveRolesRequest;

class RoleController extends BaseBackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', new Role);
        $roles = Role::all();
        return view('backend.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $role = new Role);
        $permissions = Permission::all();
        //$permissions = Permission::pluck('name', 'id');
        return view('backend.roles.create',[
            'permisos' => $permissions,
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);
        
        $role = Role::create( $request->validated() );

        $role->givePermissionTo($request->permisos);

        return redirect()->route('backend.roles.index')->withFlash('Role se a creado con exito!');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        //$permissions = Permission::pluck('name','id');
        $permissions = Permission::all();
        return view('backend.roles.edit',[
            'permisos' => $permissions,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update', $role);
    
        $role->update($request->validated());

        $role->syncPermissions($request->permisos);

        return redirect()->route('backend.roles.edit', $role)->withFlash('El role fue actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        
        $role->delete();

        return redirect()->route('backend.roles.index')->withFlash('El role fue eliminado!');

    }
}
