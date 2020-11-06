<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProperty extends Model
{
    protected $fillable = [
		'name','slug'
    ];
    
    // leer las rutas por slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

	public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
