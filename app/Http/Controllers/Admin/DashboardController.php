<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Distrito;
use App\Property;
use App\Provincia;
use App\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $distrito = Distrito::find($user->profile->id_distrito);
        $properties = Property::where('seller_id', $user->id )->paginate(1);
       ;
        return view('admin.profile.profile', [
            "user" => $user,
            'distrito' => $distrito,
            'properties' => $properties
        ]);
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
