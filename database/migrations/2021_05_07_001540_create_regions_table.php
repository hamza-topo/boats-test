<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('boat_count');
            //we can use ajson field with name of the boat but that's not the best solution for search 
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
        Schema::dropIfExists('regions');
    }
}
