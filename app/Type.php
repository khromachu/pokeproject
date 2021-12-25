<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class, 'type_id');
    }

    public  function a_types()
    {
        return $this->hasMany(AttackRelation::class, 'a_type_id');
    }

    public  function b_types()
    {
        return $this->hasMany(AttackRelation::class, 'b_type_id');
    }
}
