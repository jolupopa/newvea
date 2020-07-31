<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\User;

class AccountController extends BaseAdminController
{
    public function account()
    {
        $user = Auth::user();
        return view('admin.account.account',[
            'user' => $user
        ]);
    }

    public function datos()
    {
        $user = Auth::user();        
        $departamentos = Departamento::all();
        return view('admin.data.data', [
            'departamentos' => $departamentos,
            'user'=> $user
        ]);
    }

    

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function properties()
    {
        return view('admin.properties.properties');
    }

    public function credit()
    {
        return view('admin.credit.credits');
    }

    public function tasks()
    {
        return 'tareas';
    }

    public function contacts()
    {
        return 'contactos';
    }
}
