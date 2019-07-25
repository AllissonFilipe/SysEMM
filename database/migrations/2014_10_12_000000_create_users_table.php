<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) { //Colaborador
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('image', 100)->nullable();
            $table->enum('tipo', ['Professor', 'Coordenador']);
            $table->bigInteger('cpf')->unique();
            $table->date('data_de_nascimento');
            $table->bigInteger('telefone');
            $table->bigInteger('cep');
            $table->bigInteger('numero')->nullable();
            $table->string('logradouro');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->boolean('ativo')->nullable()->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
