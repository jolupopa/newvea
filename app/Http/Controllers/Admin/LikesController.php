<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;

class LikesController extends BaseAdminController
{
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
       

       //return $user->meGusta()->toggle($property->id);
        return auth()->user()->meGusta()->toggle($property);
    }

    public function destroy(Request $request, Property $property)
    {
        Auth::user()->meGusta()->detach($property->id);
        return back();
    }
}
