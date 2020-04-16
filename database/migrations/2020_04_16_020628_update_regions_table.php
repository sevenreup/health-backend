<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fences', function (Blueprint $table) {
            $table->integer('deaths');
            $table->integer('recovered');
            $table->integer('confirmed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fences', function (Blueprint $table) {
            $table->dropColumn(['deaths','recovered', 'confirmed']);
        });
    }
}
