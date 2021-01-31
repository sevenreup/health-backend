<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('questions_english');
            $table->string('subtitle_english')->nullable($value = true);
            $table->json('answers_english')->nullable($value = true);
            $table->string('questions_chichewa');
            $table->string('subtitle_chichewa')->nullable($value = true);
            $table->json('answers_chichewa')->nullable($value = true);
            $table->enum('type', ['223','224','225','226'])->comment('223 is for boolean. 224 is for array. 225 is for text. 226 is for array boolean')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
