<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'nama_lengkap', 'no_telp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'is_admin' => false,
        'is_banned' => false
    ];

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }

    public function lelang()
    {
        return $this->hasMany('App\Lelang');
    }

    public function lelang_logs()
    {
        return $this->hasMany('App\Lelang_log');
    }
}
