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
        Schema::table('events', function (Blueprint $table) {
            $table->id();
            $table->string('externalId', 100);
            $table->enum('type', ['entry','exit']);
            $table->enum('live', ['live','test']);
            $table->float('duration')->nullable();
            $table->integer('userId');
            $table->integer('regionId');
            $table->integer('locationAccuracy');
            $table->integer('confidence');
            $table->dateTime('createdAt',0)->useCurrent();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('regionId')->references('id')->on('regions');

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
