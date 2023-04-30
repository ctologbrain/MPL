<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleGatepassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_gatepasses', function (Blueprint $table) {
            $table->id();
            $table->integer('Is_Fpm');
            $table->integer('Fpm_Number')->nullabel();
            $table->string('GP_Number','20')->nullabel();
            $table->string('Gp_Type','10');
            $table->dateTime('GP_TIME');
            $table->dateTime('Place_Time');
            $table->integer('Route_ID');
            $table->integer('Vendor_ID');
            $table->integer('Vehicle_Model');
            $table->string('Device_ID','30')->nullabel();
            $table->string('Supervisor','30')->nullabel();
            $table->string('Seal','50')->nullabel();
            $table->integer('Start_Km')->nullabel();
            $table->string('Vehicle_Tarrif','20')->nullabel();
            $table->decimal('Driver_Adv', 10,4)->nullabel();
            $table->integer('Created_By');
            $table->integer('Modified_By')->nullabel();
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
        Schema::dropIfExists('vehicle_gatepasses');
    }
}
