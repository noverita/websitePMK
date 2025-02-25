<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPersonnel()
    {
        return $this->role === 'personnel';
    }
}
