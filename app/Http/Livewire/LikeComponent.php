<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Property;

class LikeComponent extends Component
{
    public function render()
    {
        $properties = Property::all();
        return view('livewire.like-component');
    }
}
