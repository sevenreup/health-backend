<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_info', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('subtitle')->nullable($value = true);
            $table->json('answers')->nullable($value = true);
            $table->bigInteger('question_id');
            $table->integer("locale_id");
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreign('locale_id')->references('id')->on('locales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_info');
    }
}
