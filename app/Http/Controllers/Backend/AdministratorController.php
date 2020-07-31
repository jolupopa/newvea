<?php

namespace App\Http\Controllers\Backend;

use App\Administrator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAdministratorRequest;
use Spatie\Permission\models\Role;
use Spatie\Permission\models\Permission;
use Illuminate\Support\Str;
use App\Events\AdministratorCreated;
use Illuminate\Validation\Rule;

class AdministratorController extends BaseBackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $this->authorize('view', new Administrator);

        if( auth('back')->user()->can('view', new Administrator) )
        {
            $administrators = Administrator::all();
        }
        else
        {
            $administrators = Administrator::where('id', auth('back')->user()->id )->get();
        }

        return view('backend.administrators.index', [
            'administrators' => $administrators
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Administrator);
        $roles = Role::with('permissions')->where('guard_name', 'like', 'back')->get();
        $permisos = Permission::where('guard_name', 'like', 'back')->pluck('name', 'id');
        return view('backend.administrators.create', [
            'administrator' => new Administrator,
            'roles' => $roles,
            'permisos' => $permisos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Administrator);
        // validar
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:administrators',
            'roles' =>  "required_without:['Admin', 'Writer']"
           
        ],
        [
            'roles.required_withtout' => 'Debe seleccionar al menos un rol.'
        ]);

        // generar password
        $data['password'] =  Str::random(8);

        // creamos
         $administrator = Administrator::create($data);

        // asignar roles
        $administrator->assignRole($request->roles);

        // asignar permisos
        $administrator->givePermissionTo($request->permisos);

        //enviar el email mediante evento
        AdministratorCreated::dispatch($administrator, $data['password']);

        // regresamos al usuario con un aviso
        return back()->withFlash('El usuario a sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show(Administrator $administrator)
    {
        $this->authorize('view', $administrator);
        return view('backend.administrators.show', [
            'administrator' => $administrator
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrator $administrator)
    {
        $this->authorize('update', $administrator);

        $roles = Role::with('permissions')->where('guard_name', 'like', 'back')->get();
        $permisos = Permission::where('guard_name', 'like', 'back')->pluck('name', 'id');
        return view('backend.administrators.edit', [
            'administrator' => $administrator,
            'roles' => $roles,
            'permisos' => $permisos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        return $request;
        
        $this->authorize('update', $administrator);

        $data = $request->validated();
        
        $administrator->update($data);
       
        return redirect()->route('backend.administrators.edit', $administrator)->withFlash('Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        $this->authorize('delete', $administrator);

        $administrator->delete();

        return redirect()->route('backend.administrators.index')->withFlash('Usuario Eliminado');
    }
}
