<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lelang()
    {
        return $this->hasOne('App\Lelang');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }
}
