<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hypefactors\Laravel\Follow\Traits\CanBeFollowed;
use Hypefactors\Laravel\Follow\Traits\CanFollow;

class User extends Authenticatable
{
    use HasFactory, Notifiable, CanFollow, CanBeFollowed;



    public function twits()
    {
        return $this->hasMany(Twit::class);
    }

    // public function followers()
    // {
    //     return $this->belongsToMany(User::class, 'users_followers');
    // }
//
    // public function following()
    // {
    //     return $this->belongsToMany(User::class, 'users_following');
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'birth_date',
        'bio',
        'website',
        'password',
        'image_path',
        'bg_image_path'
    ];

    protected $guarded = [
        'isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNickname($name)
    {
        $nickname = '@' . implode(array_map('trim', explode(" ", $name)));
        return $nickname;
    }
}
