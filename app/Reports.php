<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'reports';
    //


    public function Authreoprt(){
        return $this->belongsTo(User::class,'reportowner');
    }
    public function Userreoprt(){
        return $this->belongsTo(User::class,'reportuser');
    }

}
