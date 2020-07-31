<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Administrator extends Authenticatable {
	use Notifiable, HasRoles;

	protected $guard_mame = 'back';

	//protected $guard = 'back';


	

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
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

	public function Foto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("avatars/$actual");
            }
            $imageName = $this->id . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(200, 200, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("avatars/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

	// mutador
	public function SetPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}



	// relation
	public function posts()
	{
		return $this->hasMany(Post::class);
	}


}
