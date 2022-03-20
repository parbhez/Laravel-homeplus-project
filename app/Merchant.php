<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Merchant extends Authenticatable
{

    protected $table = 'merchants';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
