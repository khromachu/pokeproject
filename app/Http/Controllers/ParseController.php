<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Type;
use App\AttackRelation;

class ParseController extends Controller
{
    public $api_url = 'https://pokeapi.co/api/v2';

    public function parse_all(){
        $jpokemons = $this->getJSON($this->api_url.'/pokemon?limit=99');
        foreach ($jpokemons->results as $poke){
            $this->parsePokemon($this->getJSON($poke->url));
        }
        return Pokemon::all();
    }

    public function getJSON($request) {
        $json = file_get_contents($request);
        return json_decode($json);
    }

    public function parsePokemon($jpokemon){
        $pokemon = new Pokemon();
        $pokemon->id = $jpokemon->id;
        $dbPokemon = Pokemon::all()
            ->where('id', $pokemon->id)
            ->first();
        if ($dbPokemon != null) return $dbPokemon;
        $pokemon->name = $jpokemon->name;
        $pokemon->image = $jpokemon->sprites->front_default;
        $stats = $jpokemon->stats;
        foreach ($stats as $stat){
            $stat_name = $stat->stat->name;
            switch ($stat_name){
                case 'hp':
                    $pokemon->base_hp = $stat->base_stat;
                    break;
                case 'attack':
                    $pokemon->base_attack = $stat->base_stat;
                    break;
                case 'defense':
                    $pokemon->base_defence = $stat->base_stat;
                    break;
                case 'special-attack':
                    $pokemon->base_special_attack = $stat->base_stat;
                    break;
                case 'special-defense':
                    $pokemon->base_special_defence = $stat->base_stat;
                    break;
                case 'speed':
                    $pokemon->base_speed = $stat->base_stat;
                    break;
            }
        }
        $pokemon->type_id = $this->parseType($this->getJSON($jpokemon->types[0]->type->url))->id;
        $jspecies = $this->getJSON($jpokemon->species->url);
        $preEvo = $jspecies->evolves_from_species;
        $preEvolution = null;
        if ($preEvo != null){
            $preEvoSpecies = $this->getJSON($preEvo->url);
            $preEvoVarieties = $preEvoSpecies->varieties;
            foreach ($preEvoVarieties as $variety){
                if ($variety->is_default){
                    $preEvolution = $this->parsePokemon($this->getJSON($variety->pokemon->url));
                    $pokemon->pre_evolution_id = $preEvolution->id;
                    break;
                }
            }
        }
        $pokemon->save();
        return $pokemon;
    }

    public function parseType($jtype){
        $type = new Type();
        $type->id = $jtype->id;
        $dbType = Type::all()->where('id', $type->id)->first();
        if ($dbType != null) return $dbType;
        $type->name = $jtype->name;
        $type->save();
        return $type;
    }

    public function parseAttackRelations(){
        $types = Type::all();
        foreach ($types as $type){
            $jtype = $this->getJSON($this->api_url.'/type/'.$type->id);
            $jrelations = $jtype->damage_relations;
            $this->createRelation($type, $jrelations->double_damage_from, 2);
            $this->createRelationReverse($type, $jrelations->double_damage_to, 2);
            $this->createRelation($type, $jrelations->half_damage_from, 0.5);
            $this->createRelationReverse($type, $jrelations->half_damage_to, 0.5);
            $this->createRelation($type, $jrelations->no_damage_from, 0);
            $this->createRelationReverse($type, $jrelations->no_damage_to, 0);
        }
        return AttackRelation::all();
    }

    public function createRelation($type, $jrelationsNow, $multi){
        foreach ($jrelationsNow as $jrelation){
            $relation = new AttackRelation();
            $relation->a_type_id = $this->parseType($this->getJSON($jrelation->url))->id;
            $relation->b_type_id = $type->id;
            $relation->multiplier = $multi;
            if(AttackRelation::all()
                ->where('a_type_id', $relation->a_type_id)
                ->where('b_type_id', $relation->b_type_id)
                ->first() == null)
                $relation->save();
        }
    }

    public function createRelationReverse($type, $jrelationsNow, $multi){
        foreach ($jrelationsNow as $jrelation){
            $relation = new AttackRelation();
            $relation->b_type_id = $this->parseType($this->getJSON($jrelation->url))->id;
            $relation->a_type_id = $type->id;
            $relation->multiplier = $multi;
            if(AttackRelation::all()
                    ->where('a_type_id', $relation->a_type_id)
                    ->where('b_type_id', $relation->b_type_id)
                    ->first() == null)
                $relation->save();
        }
    }
}
