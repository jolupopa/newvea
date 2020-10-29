<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = [
		'name','slug', 'distrito_id'
    ];
    

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);   
    }
}

