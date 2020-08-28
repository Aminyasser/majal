<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //

    protected $table = 'friends';
    //
    public function followU(){
        return $this->belongsTo(User::class,'user');
    }
    public function followF(){
        return $this->belongsTo(User::class,'friend');
    }
}
