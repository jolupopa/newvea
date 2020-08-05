<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use App\Distrito;
use App\Provincia;
use App\User;

class DashboardController extends BaseAdminController
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
        return view('admin.datauser.data', [
            'departamentos' => $departamentos,
            'user'=> $user
        ]);
    }

    

    public function profile()
    {
        $user = Auth::user(); 
        return view('admin.profile.profile', [
            "user" => $user
        ]);
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
