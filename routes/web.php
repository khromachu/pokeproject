<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PokemonController@pokemons_list_page');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/pokemons-of-day', function () {
    return view('pokemons-of-day')->with('pokemons', \App\Pokemon::all()->random(5));
});

Route::get('/pokemon/{pokemon_id}', 'PokemonController@pokemon_page');
Route::post('/pokemon/{pokemon_id}/edit', 'PokemonController@edit_pokemon');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/parse/pokemons/all', 'ParseController@parse_all');
Route::get('/parse/relations/all', 'ParseController@parseAttackRelations');

Route::get('/api/pokemons/get', 'PokemonController@get_pokemons');

Route::get('/pokemons/get-by-url', 'PokemonController@find_pokemon');
