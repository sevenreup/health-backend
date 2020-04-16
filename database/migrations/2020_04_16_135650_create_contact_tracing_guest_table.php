<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTracingGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactTracingGuest', function (Blueprint $table) {
            $table->id();
            $table->integer('sender');
            $table->string('recipientName');
            $table->string('recipientNumber');
            $table->enum('status', ['pending','accepted','rejected'])->default('pending');
            $table->timestamps();


            $table->foreign('sender')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactTracingGuest');
    }
}
