<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use app\Post;


class User extends Authenticatable implements MustVerifyEmail {
	use Notifiable, HasRoles;
	use SoftDeletes;
	

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = [
		'name',
		'nickname',
		'email', 
		'password', 
		'avatar', 
		'in_home',
		'url_in_home',
		'active',
		'num_regulars', // anuncios regulares
		 'num_featured', // anuncios destacados
		 'max_properties'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function favorites() {
		return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'property_id')->withTimeStamps();
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function profile()
	{
		return $this->hasOne(Profile::class);
	}
/**
	 * Implementado igual de tweets.
	 */
	public function properties()
    {
        return $this->hasMany(Property::class)->latest();
		}
		public function likes()
    {
        return $this->hasMany(Like::class);
    }



	

	
}
