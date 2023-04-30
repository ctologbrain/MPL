<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_scans', function (Blueprint $table) {
            $table->id();
            $table->date('ScanDate');
            $table->string('vehicleType');
            $table->string('vendorName','11');
            $table->string('driverName','11');
            $table->string('startkm','11')->nullable();
            $table->string('endkm','11')->nullable();
            $table->string('marketHireAmount','11')->nullable();
            $table->string('unloadingSupervisorName','11')->nullable();
            $table->string('pickupPersonName','11')->nullable();
            $table->string('remark','11')->nullable();
            $table->string('docketNo','11');
            $table->string('advanceToBePaid','11')->nullable();
            $table->string('paymentMode','11')->nullable();
            $table->string('advanceType','11')->nullable();
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
        Schema::dropIfExists('pickup_scans');
    }
}
