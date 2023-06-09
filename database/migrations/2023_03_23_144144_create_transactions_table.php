<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->double('amount');
            $table->string('message')->nullable();
            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id')->on('users');
            $table->integer('fk_account')->unsigned();
            $table->foreign('fk_account')->references('id')->on('accounts');
            $table->integer('fk_transaction_type')->unsigned();
            $table->foreign('fk_transaction_type')->references('id')->on('transaction_types');
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
        Schema::dropIfExists('transactions');
    }
};
