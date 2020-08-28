<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';


    //
    public function Job(){

        return $this->hasMany(User::class);

    }
}
