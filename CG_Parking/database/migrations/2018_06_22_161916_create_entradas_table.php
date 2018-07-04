<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {

            $table->increments('id');
            $table->string('placa');
            $table->integer('tipo_veiculo_id')->unsigned();
            $table->foreign('tipo_veiculo_id')->references('id')->on('tipo_veiculos')->onDelete('cascade') -> onUpdate('cascade');
            $table->string('modelo',20) ->nullable();
            $table->string('cor',20) ->nullable();
            $table->integer('ano') ->nullable();
            $table->integer('user_id_user')->unsigned() -> nullable();
            $table->foreign('user_id_user')->references('id')->on('users')->onDelete('cascade') -> onUpdate('cascade');
            $table->integer('user_id_oper')->unsigned();
            $table->foreign('user_id_oper')->references('id')->on('users')->onDelete('cascade') -> onUpdate('cascade');
            $table->integer('vaga_id')->unsigned();
            $table->foreign('vaga_id')->references('id')->on('vagas')->onDelete('cascade') -> onUpdate('cascade');
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
        Schema::dropIfExists('entradas');
    }
}
