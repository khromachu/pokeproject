<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->integer('base_hp');
            $table->integer('base_attack');
            $table->integer('base_defence');
            $table->integer('base_special_attack');
            $table->integer('base_special_defence');
            $table->integer('base_speed');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('pre_evolution_id')->nullable();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('pre_evolution_id')->references('id')->on('pokemons');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
