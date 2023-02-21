<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('VehicleType',20);
            $table->string('Capacity',20);
            $table->string('BodyType',20)->nullable();
            $table->string('Length',10)->nullable();
            $table->string('Width',10)->nullable();
            $table->string('height',10)->nullable();
            $table->string('TotalWheels',10);
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
        Schema::dropIfExists('vehicle_types');
    }
}
