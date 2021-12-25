<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function pre_evolution()
    {
        return $this->hasOne(Pokemon::class, 'pre_evolution_id');
    }
}
