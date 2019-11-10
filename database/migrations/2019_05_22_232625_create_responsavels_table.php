<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->bigInteger('cpf')->unique();
            $table->bigInteger('telefone');
            $table->string('grau_de_parentesco');
            $table->string('senha');
            $table->bigInteger('cep');
            $table->bigInteger('numero')->nullable();
            $table->string('logradouro');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->boolean('ativo')->nullable()->default(true);
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
        Schema::dropIfExists('responsavels');
    }
}
