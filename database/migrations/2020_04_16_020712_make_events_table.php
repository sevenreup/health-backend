<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('externalId', 100);
            $table->enum('type', ['entry','exit']);
            $table->enum('live', ['live','test']);
            $table->float('duration')->nullable();
            $table->integer('userId');
            $table->integer('fencesId');
            $table->integer('locationAccuracy');
            $table->integer('confidence');
            $table->dateTime('createdAt',0)->useCurrent();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('fencesId')->references('id')->on('fences');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('events');


    }
}
