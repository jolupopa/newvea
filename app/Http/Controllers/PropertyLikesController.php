<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Property;

class PropertyLikesController extends Controller
{
    public function store(Property $property)
    {
        $tweet->like(current_user());

        return back();
    }

    public function destroy(Property $property)
    {
        $tweet->dislike(current_user());

        return back();
    }
}
