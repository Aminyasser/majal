<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //

    public function userchat()
    {
        return $this->belongsTo(User::class, 'sender');
    }
}
