<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'quota' => 0,
        'enabled' => true,
        'sendonly' => false,
        'admin' => null,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'domain',
        'password',
        'quota',
        'enabled',
        'sendonly',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
