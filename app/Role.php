<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model

{
   //
    protected $table = 'roles';

    public function roleuser(){

        return $this->hasMany(Services::class);
    }

}
