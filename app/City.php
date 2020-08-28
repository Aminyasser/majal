<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'city',
    ];
    protected $table = 'city';


    public function City(){

        return $this->hasMany('App\user');

    }
    public function Place(){

        return $this->hasMany(Services::class);

    }
    public function pages(){

        return $this->hasMany(pages::class);

    }
}
