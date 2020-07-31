<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'photoable_type', 'photoable_id', 'url' ,'featured'
    ];


    // relacion polimorfica 1 a muchos
    public function photoable()
    {
        return $this->morphManyTo();
    }
}
