<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    public  function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
