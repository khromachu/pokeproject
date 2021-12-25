<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttackRelation extends Model
{
    protected $table = 'attack_relations';

    public $incrementing = false;

    public function a_type()
    {
        return $this->belongsTo(Type::class, 'a_type_id');
    }

    public function b_type()
    {
        return $this->belongsTo(Type::class, 'b_type_id');
    }
}
