<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
		'provincia_id', 'urlFoto', 'in_home'
	];

	public function properties()
	{
		return $this->hasMany(Property::class);
	}

	public function provincia()
	{
			return $this->belongsTo(Provincia::class);
	}
}
