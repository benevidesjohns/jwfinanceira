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
        Schema::create('transacao', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->double('valor');
            $table->string('detalhes');
            $table->integer('fk_conta')->unsigned();
            $table->foreign('fk_conta')->references('id')->on('conta');
            $table->integer('fk_tipo_transacao')->unsigned();
            $table->foreign('fk_tipo_transacao')->references('id')->on('tipo_transacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacao');
    }
};
