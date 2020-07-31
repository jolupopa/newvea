<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;

class DashboardController extends BaseBackendController
{
    public function index()
    {
        return view('backend/dashboard/index');
    }
}
