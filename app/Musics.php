<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musics extends Model
{
    protected $table = 'musics';

    public function music()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
