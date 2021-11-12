<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugestoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user');
            $table->string('titulo');
            $table->text('descricao');
            $table->integer('status')->default('0');
            $table->integer('etapa')->nullable();
            $table->string('tipo')->nullable();
            $table->timestamp('data_aprovacao')->nullable();
            $table->timestamp('data_reprovacao')->nullable();
            $table->string('caminho')->nullable();
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugestoes');
    }
}
