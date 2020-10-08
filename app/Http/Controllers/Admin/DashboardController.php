<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Distrito;
use App\Property;
use App\Provincia;
use App\Departamento;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseAdminController
{
    public function account()
    {
        return view('admin.account.account',[
            'user' => Auth::user()
        ]);
    }

    public function datos()
    {       
        $departamentos = Departamento::all();
        return view('admin.datauser.data', [
            'departamentos' => $departamentos,
            'user'=> Auth::user()
        ]);
    }

    

    public function profile()
    {
        
        $user = Auth::user(); 
        $distrito_user = Distrito::find($user->profile->id_distrito);
        $properties = Property::with( [ 'photos' => function($query){
            $query = $query->where('featured', 1);
        }])->where('seller_id', $user->id )->paginate(10);
    
        return view('admin.profile.profile', [
            "user" => $user,
            'properties' => $properties,
            'distrito' => $distrito_user,
            'nav_menu' => 'admin.menu_user.menu'
        ]);
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
