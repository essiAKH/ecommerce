<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'roles_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function isAdmin()
    {
        return $this->role && $this->role->role_name === 'admin';
    }
}