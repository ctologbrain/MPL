<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartTruckLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_truck_loads', function (Blueprint $table) {
            $table->id();
            $table->integer('gatePassId');
            $table->integer('offcieId');
            $table->integer('DocketNo');
            $table->integer('ActualWeight');
            $table->integer('ActualPicess');
            $table->integer('PartWeight');
            $table->integer('PartPicess');
            $table->integer('Allow');
            $table->integer('CeatedBy');
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
        Schema::dropIfExists('part_truck_loads');
    }
}
