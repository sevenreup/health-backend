<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTracingUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactTracingUser', function (Blueprint $table) {
            $table->id();
            $table->integer('sender');
            $table->integer('recipient');
            $table->enum('status', ['pending','accepted','rejected'])->default('pending');
            $table->timestamps();


            $table->foreign('sender')->references('id')->on('users');
            $table->foreign('recipient')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactTracingUser');
    }
}
