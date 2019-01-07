<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pay_id');
            $table->string('country')->nullable();
            $table->string('fullName')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('pay_banks');
    }
}
