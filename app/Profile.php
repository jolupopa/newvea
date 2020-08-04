<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'type_doc',
        'num_doc',
        'address',
        'email2',
        'distrito',
        'movil',
        'phone',
        'url_facebook',
        'url_youtube',
        'url_linkedin',
        'url_instagram',
        'url_twitter',
        'url_web',
        'w_messenger',
        'w_bussines',
        'url_foto',
        'title',
        'about_me'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
	{
		return $this->hasMany(Property::class);
	}
}
