<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->string('answer_array')->nullable($value = true)->change();
            $table->string('answer_boolean')->nullable($value = true)->change();
            $table->string('long_answer')->nullable($value = true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn(['answer_array']);
            $table->dropColumn(['answer_boolean']);
            $table->dropColumn(['long_answer']);
            
        });
    }
}
