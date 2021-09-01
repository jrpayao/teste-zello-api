<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth')->nullable();
            $table->integer('cpf')->nullable();
            $table->string('email')->nullable();
            $table->integer('rg')->nullable();
            $table->foreignId('perfil_id')->nullable()->references('id')->on('tb_perfil');
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
        Schema::dropIfExists('tb_pessoa');
    }
}
