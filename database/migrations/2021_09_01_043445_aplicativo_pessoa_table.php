<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AplicativoPessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_aplicativo_pessoa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->references('id')->on('tb_pessoa');
            $table->foreignId('aplicativo_id')->references('id')->on('tb_aplicativo');
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
        Schema::drop('tb_perfil_pessoa');

    }
}
