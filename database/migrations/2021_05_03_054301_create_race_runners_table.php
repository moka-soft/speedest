<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceRunnersTable extends Migration
{
    public function up()
    {
        Schema::create('race_runners', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('runner_id')->index();
            $table->unsignedInteger('race_id')->index();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->index(['race_id', 'runner_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('race_runners');
    }
}
