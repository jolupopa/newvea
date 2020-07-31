<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Property extends Model {


	protected $fillable = [
		'codigo',
		'title',
		'resumen',
		'detalle',
		'zona' ,
		'direccion',
		'precio',
		'url_caratula',
		'url_google_maps',
		'longitud',
		'latitud',
		'url_video',
		'url_plano1',
		'url_plano2',
		'area',
		'area_construida',
		'year_build',
		'num_pisos',
		'num_cuartos',
		'num_cars',
		'bathroon',
		'midle_bathroon',
		'destacada',
		'publicada',
		'activa',
		'en_estreno',
		'en_parque',
		'en_esquina',
		'en_condominio',
		'en_amoblado',
		'en_avenida',
		'en_provivienda',
		'en_judicial',
		'published_at',
		'seller_id',
		'city_id',
		'distrito_id',
		'type_property_id'
		
	];

	// uno a muchos
	
	public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
	}
	
	public function city()
	{
		return $this->belongsTo(City::class);
	}


	public function type_property()
	{
		return $this->belongsTo(TypeProperty::class);
	}


	public function seller()
    {
        return $this->belongsTo(Seller::class);
	}
	
	public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
	

	// para obtener la informacion del usuario desde perfil del vendedor
	public function profile() 
	{
		return $this->belongsTo(Profile::class, 'seller_id');
	}

	public function features()
    {
        return $this->belongsToMany(Feature::class);
	}

	public function details()
    {
        return $this->belongsToMany(Detail::class);
	}
	
	

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
