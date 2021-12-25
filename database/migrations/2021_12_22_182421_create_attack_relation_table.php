<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttackRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attack_relations', function (Blueprint $table) {
            $table->unsignedBigInteger('a_type_id');
            $table->unsignedBigInteger('b_type_id');
            $table->float('multiplier');

            $table->foreign('a_type_id')->references('id')->on('types');
            $table->foreign('b_type_id')->references('id')->on('types');

            $table->primary(['a_type_id', 'b_type_id']);

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
        Schema::dropIfExists('attack_relations');
    }
}
