<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'lelang';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
}
