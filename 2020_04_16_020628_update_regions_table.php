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
            $table->integer('deaths')->nullable();
            $table->integer('recovered')->nullable();
            $table->integer('confirmed')->nullable();
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
