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
        Schema::create('conta', function (Blueprint $table) {
            $table->id();
            $table->double('balanco');
            $table->integer('fk_cliente')->unsigned();
            $table->foreign('fk_cliente')->references('id')->on('cliente');
            $table->integer('fk_tipo_conta')->unsigned();
            $table->foreign('fk_tipo_conta')->references('id')->on('tipo_conta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta');
    }
};
