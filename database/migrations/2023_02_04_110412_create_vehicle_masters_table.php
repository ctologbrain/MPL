<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_masters', function (Blueprint $table) {
            $table->id();
            $table->string('Reportinghub','11');
            $table->string('ReportingTime','11');
            $table->string('Owner','11')->nullable();
            $table->string('TariffType','11')->nullable();
            $table->string('MonthRent','11')->nullable();
            $table->string('Rentwef','11')->nullable();
            $table->string('MonthlyFixKm','11')->nullable();
            $table->string('AdditionalPerKmRate','11')->nullable();
            $table->string('PerHRRate','11')->nullable();
            $table->string('PlacementType','11')->nullable();
            $table->string('VendorName','11')->nullable();
            $table->string('VehicleModel','11')->nullable();
            $table->string('VehicleNo','11')->nullable();
            $table->string('ChasisNo','11')->nullable();
            $table->string('EngineNo','11')->nullable();
            $table->string('RegistrationNo','11')->nullable();
            $table->string('RegistrationState','11')->nullable();
            $table->string('TypeOfRegistration','11')->nullable();
            $table->string('InsuranceValidity','11')->nullable();
            $table->string('InsuredAmount','11')->nullable();
            $table->string('InsuranceCompany','11')->nullable();
            $table->string('YearofMfg','11')->nullable();
            $table->string('NosOfDrivers','11')->nullable();
            $table->string('FuelType','11')->nullable();
            $table->string('FitnessValidity','11')->nullable();
            $table->string('VehiclePermit','11')->nullable();
            $table->string('IsGps','5')->nullable();
            $table->string('GPSDeviceID','5')->nullable();
            $table->string('Month','5255')->nullable();
            $table->string('AllowMultiHUB','5')->nullable();
            $table->string('VehicleAvailability','5')->nullable();
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
        Schema::dropIfExists('vehicle_masters');
    }
}
