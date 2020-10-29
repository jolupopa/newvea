<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class);
    }
}


