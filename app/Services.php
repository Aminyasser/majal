<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    public function Services()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Place()
    {
        return $this->belongsTo(City::class, 'place');
    }
    public function viewservices()
    {
        return $this->hasMany(PostsViews::class, 'id_service');
    }
}
