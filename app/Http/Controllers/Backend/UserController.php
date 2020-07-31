<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class UserController extends BaseBackendController
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', [
            'users' => $users,
            'administrator' => auth()->user()
        ]);
    }

    
}
