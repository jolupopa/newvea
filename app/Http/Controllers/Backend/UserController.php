<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class UserController extends BaseBackendController
{
    public function index(Request $request)
    {

       

        if( $request->ajax() ){
            $users = User::all();
            return DataTables::of($users)
                ->addColumn('action', 'backend.users.sections.actions')
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('backend.users.index', [
            'administrator' => auth()->user()
        ]);
    }

   
}
