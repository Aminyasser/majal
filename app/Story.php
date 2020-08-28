<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
    protected $table = 'storys';

    public function userstory()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
