<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}
