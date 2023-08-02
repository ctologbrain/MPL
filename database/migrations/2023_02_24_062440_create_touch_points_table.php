<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouchPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touch_points', function (Blueprint $table) {
            $table->id();
            $table->integer('RouteId');
            $table->integer('CityId');
            $table->integer('RouteOrder');
            $table->integer('Time');
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
        Schema::dropIfExists('touch_points');
    }
}
