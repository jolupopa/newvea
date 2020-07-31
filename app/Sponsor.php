<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
		'name', 'slug_name', 'url_foto', 'url_web', 'option'
	];
}
