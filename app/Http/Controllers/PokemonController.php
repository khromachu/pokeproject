<?php

namespace App\Http\Controllers;

use App\AttackRelation;
use App\Pokemon;
use App\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PokemonController extends Controller
{
    public function pokemons_list_page(Request $req){
        $count = Pokemon::all()->count();
        $page_number = intval($req->input('page', 1));
        $pokemons = Pokemon::all()->forPage($page_number, 12)->load('type');

        return view('index')
            ->with('pokemons', $pokemons)
            ->with('page', $page_number)
            ->with('pages_count', ceil(floatval($count)/12));
    }

    public function getEvoChain($pokemon){
        $evoChain = [$pokemon];
        $preEvoId = $pokemon->pre_evolution_id;
        while ($preEvoId != null){
            $preEvo = Pokemon::all()->where('id', $preEvoId)->load('type')->first();
            array_unshift($evoChain, $preEvo);
            $preEvoId = $preEvo->pre_evolution_id;
        }
        $postEvo = Pokemon::all()->where('pre_evolution_id', $pokemon->id)->load('type')->first();
        while ($postEvo != null){
            array_push($evoChain, $postEvo);
            $postEvo = Pokemon::all()->where('pre_evolution_id', $postEvo->id)->load('type')->first();
        }
        return $evoChain;

    }

    public function pokemon_page(Request $req, $pokemon_id){
        $pokemon = Pokemon::all()->where('id', intval($pokemon_id))->first()->load('type');
        $prev = Pokemon::all()->where('id', '<', $pokemon_id)->last();
        $next = Pokemon::all()->where('id', '>', $pokemon_id)->first();
        $weaknesses = AttackRelation::all()
            ->where('b_type_id', $pokemon->type_id)
            ->where('multiplier', '>', 1)
            ->load('a_type');
        $types = Type::all()->sortBy('name');

        return view('pokemon')
            ->with('pokemon', $pokemon)
            ->with('evo_chain', $this->getEvoChain($pokemon))
            ->with('weaknesses', $weaknesses)
            ->with('prev', $prev)
            ->with('next', $next)
            ->with('types', $types);
    }

    public function edit_pokemon(Request $req, $pokemon_id){

        if ($req->isMethod('post')) {
            if(Auth::check())
                if (Auth::user()->role_id == 2){

                    $pokemon = Pokemon::all()->where('id', intval($pokemon_id))->first();
                    $pokemon->base_hp = $req->input('base_hp');
                    $pokemon->base_attack = $req->input('base_attack');
                    $pokemon->base_defence = $req->input('base_defence');
                    $pokemon->base_special_attack = $req->input('base_special_attack');
                    $pokemon->base_special_defence = $req->input('base_special_defence');
                    $pokemon->base_speed = $req->input('base_speed');
                    $pokemon->type_id = $req->input('type_id');
                    $pokemon->save();
                }

        }

        return redirect('/pokemon/'.$pokemon->id);
    }
}
