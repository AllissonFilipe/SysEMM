<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacaoColabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacao_colabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('tipo',['Geral','Turma','Individual']);
            $table->enum('categoria',['Evento','Reunião','Acadêmico']);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('aluno_id')->nullable();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->unsignedInteger('turma_id')->nullable();
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade');
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
        Schema::dropIfExists('notificacao_colabs');
    }
}
