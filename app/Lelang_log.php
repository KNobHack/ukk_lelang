<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang_log extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lelang()
    {
        return $this->belongsTo('App\Lelang');
    }
}
