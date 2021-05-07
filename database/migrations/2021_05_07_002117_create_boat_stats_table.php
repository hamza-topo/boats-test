<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_stats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id');
            $table->tinyInteger('typ_id');
            $table->integer('boat_count');
            $table->decimal('min_price',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boat_stats');
    }
}
