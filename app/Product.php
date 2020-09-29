<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'number_adds',
        'number_days',
        'number_photos',
        'video',
        'planos',
        'vista_home',
        'vista_map',
        'visibilidad',
        'sugerencia'
    ];
}
