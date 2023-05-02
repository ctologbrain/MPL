<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_masters', function (Blueprint $table) {
            $table->id();
            $table->string('OfficeName',10);
            $table->string('ModeType',10)->nullable();
            $table->string('VendorCode',10);
            $table->string('VendorName',10);
            $table->string('NatureOfVendor',10)->nullable();
            $table->string('FCM',10)->nullable();
            $table->string('Identification',10)->nullable();
            $table->string('Gst',10)->nullable();
            $table->string('TransportGroup',10)->nullable();
            $table->string('CreditPeriod',10)->nullable();
            $table->string('Password',10)->nullable();
            $table->string('WithoutFPM',10)->nullable();
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
        Schema::dropIfExists('vendor_masters');
    }
}
