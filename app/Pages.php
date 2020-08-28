<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    //

    public function pages(){
        return $this->belongsTo(City::class,'place');
    }

    public function Authpage(){
        return $this->belongsTo(User::class,'admin');
    }

    public function pagelike()
    {
        return $this->hasMany(Like::class,'page_id');
    }

}
