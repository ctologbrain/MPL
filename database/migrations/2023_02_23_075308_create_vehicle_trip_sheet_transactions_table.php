<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTripSheetTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_trip_sheet_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('Route_Id');
            $table->date('Fpm_Date');
            $table->integer('Trip_Type');
            $table->integer('Vehicle_Type');
            $table->integer('Vehicle_Provider');
            $table->integer('Vehicle_No');
            $table->integer('Vehicle_Model');
            $table->integer('Driver_Id');
            $table->date('Reporting_Time');
            $table->integer('Weight');
            $table->date('vehcile_Load_Date');
            $table->string('Remark','255');
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
        Schema::dropIfExists('vehicle_trip_sheet_transactions');
    }
}
