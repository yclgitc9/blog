<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;

class User extends Authenticatable
{
    use Notifiable;

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

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function gravatar()
    {
        $email = $this->email;
        $default = "https://www.resellerratings.com/image/avatar/5700149";
        $size = 100;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }

    public function getBioHtmlAttribute($value)
    {
        return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
