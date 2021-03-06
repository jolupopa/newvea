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
