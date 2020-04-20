<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang_log extends Model
{
    protected $fillable = [
        'user_id',
        'harga',
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lelang()
    {
        return $this->belongsTo('App\Lelang');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
