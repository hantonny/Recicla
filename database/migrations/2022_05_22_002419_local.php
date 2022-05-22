<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Local extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nome')->unique();
            $table->string('lat')->unique();
            $table->string('lng')->unique();
            $table->string('horario_aberto');
            $table->string('horario_fechado');
            $table->string('dias');
            $table->string('endereco');
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
        Schema::drop('local');
    }
}
