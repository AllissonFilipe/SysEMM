<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chave')->unique();
            $table->enum('tipo',['Inteiro','Decimal','Data','Lógico','Texto']);
            $table->integer('valor_inteiro')->nullable();
            $table->double('valor_decimal')->nullable();
            $table->date('valor_data')->nullable();
            $table->boolean('valor_logico')->nullable();
            $table->string('valor_texto')->nullable();
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
        Schema::dropIfExists('parametros');
    }
}
