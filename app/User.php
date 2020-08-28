<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'date',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'token', 'updated_at'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function moves()
    {
        return $this->hasMany(Services::class);
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function userlike()
    {

        return $this->hasMany(Like::class, 'id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city');
    }
    public function Place()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function Job()
    {
        return $this->belongsTo(Job::class, 'job');
    }
    public function Authreoprt()
    {
        return $this->hasMany(Reports::class);
    }

    public function Userreoprt()
    {
        return $this->hasMany(Reports::class);
    }
    public function Services()
    {

        return $this->belongsTo(Services::class, 'id');
    }

    public function roleuser()
    {

        return $this->belongsTo(Role::class, 'per');
    }

    public function Authpage()
    {
        return $this->hasMany(Pages::class);
    }

    public function followUser()
    {
        return $this->belongsTo(Friends::class, 'user');
    }
    public function followF()
    {
        return $this->belongsTo(Friends::class);
    }

    // public function chatuser()
    // {
    //     return $this->belongsToMany(Chat::class, 'id');
    // }



    public function userfrind()
    {
        return $this->belongsToMany(Friends::class, 'friends', 'friend', 'user');
    }

    public function viewprofile()
    {
        return $this->hasMany(PostsViews::class, 'profile_id');
    }

    public function commentsprofile()
    {
        return $this->hasMany(comment::class, 'user_id');
    }

    public function likesprofile()
    {
        return $this->hasMany(Like::class, 'user_id');
    }





    // public function Verified(){

    //     return $this->token === null;
    // }

    // public function sendVerifyemail(){

    //     $this->notify(new VerifyEmail($this));

    // }
}
