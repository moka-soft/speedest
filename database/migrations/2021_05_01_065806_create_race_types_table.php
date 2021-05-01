<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceTypesTable extends Migration
{
    public function up()
    {
        Schema::create('race_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('distance');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('race_types');
    }
}
