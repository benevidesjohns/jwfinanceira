<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->double('balanco');
            $table->integer('fk_cliente')->unsigned();
            $table->foreign('fk_cliente')->references('id')->on('clientes');
            $table->integer('fk_tipo_conta')->unsigned();
            $table->foreign('fk_tipo_conta')->references('id')->on('tipo_contas');
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
        Schema::dropIfExists('contas');
    }
};
