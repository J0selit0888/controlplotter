<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimpresionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimpresions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->nullable();
            $table->date('fecha')->nullable();
            // $table->integer('usuario_id')->nullable();
            // $table->integer('tamhoja_id')->nullable();

            // $table->foreign('usuario_id')->references('id')->on('usuarios');
            // $table->foreign('tamhoja_id')->references('id')->on('tamhojas');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('tamhoja_id')->constrained('tamhojas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regimpresions');
    }
}
