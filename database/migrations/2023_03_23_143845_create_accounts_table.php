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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Minha Conta');
            $table->string('account_number')->unique();
            $table->double('balance')->default(0);
            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id')->on('users');
            $table->integer('fk_account_type')->unsigned();
            $table->foreign('fk_account_type')->references('id')->on('account_types');
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
        Schema::dropIfExists('accounts');
    }
};
