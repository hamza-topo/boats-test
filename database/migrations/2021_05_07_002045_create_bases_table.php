<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('region_id');
            $table->tinyInteger('type');
            $table->tinyInteger('main');
            $table->integer('boat_count');
            $table->string('name_fr',100);
            $table->string('name_uk',100);
            $table->string('name_de',100);
            $table->string('name_it',100);
            $table->string('name_es',100);
            $table->string('name_be',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bases');
    }
}
