<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'parent_id', 'area_id', 'level', 'address', 'phone', 'identity_number', 'identity_day'
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

    public function area()
    {
        return $this->hasOne(Area::class, 'area_id', 'id');
    }

    public function bank()
    {
        return $this->hasMany(Bank::class, 'bank_id', 'id');
    }

    public function identities ()
    {
        return $this->hasOne(Identity::class, 'identity_id', 'id');
    }
}
