<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lelang';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'waktu_berakhir',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }

    public function logs()
    {
        return $this->hasMany('App\Lelang_log');
    }
}
