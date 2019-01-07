<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('place')->nullable();
            $table->string('person_much')->nullable();
            $table->string('search')->nullable();
            $table->string('days')->nullable();
            $table->string('months')->nullable();
            $table->string('nationalty')->nullable();
            $table->string('other_n')->nullable();
            $table->string('fav_gender')->nullable();
            $table->string('where_get')->nullable();
            $table->string('budget')->nullable();
            $table->string('goals')->nullable();
            $table->string('courses_feed')->nullable();
            $table->boolean('state')->default(0);
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
        Schema::dropIfExists('frms');
    }
}
