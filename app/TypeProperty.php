<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProperty extends Model
{
    protected $fillable = [
		'name'
	];

	public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
