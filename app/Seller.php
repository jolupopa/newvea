<?php

namespace App;
use App\User;
use App\Property;
use App\Profile;
use App\Scope\SellerScope;
use Illuminate\Database\Eloquent\Model;


class Seller extends User
{
	protected $table = 'users';
	
    protected static function boot()
	{
		parent::boot();

		static::addGlobalScope(new SellerScope);
	}

    public function properties()
    {
    	return $this->hasMany(Property::class);
	}

	public function profile()
	{
		return $this->hasOne(Profile::class, 'user_id');
	}
	
	
}
