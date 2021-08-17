<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hypefactors\Laravel\Follow\Traits\CanBeFollowed;
use Hypefactors\Laravel\Follow\Traits\CanFollow;
use Hypefactors\Laravel\Follow\Contracts\CanFollowContract;
use Hypefactors\Laravel\Follow\Contracts\CanBeFollowedContract;

class User extends Authenticatable implements  CanFollowContract, CanBeFollowedContract
{
    use HasFactory, Notifiable, CanFollow, CanBeFollowed;

    public function twits()
    {
        return $this->hasMany(Twit::class);
    }

    public function profile_feed()
    {
        return $this->belongsToMany(Twit::class, 'feed');
    }

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
        'id',
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
}
