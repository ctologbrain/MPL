<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_details', function (Blueprint $table) {
            $table->id();
            $table->string('Vid',11);
            $table->string('Name',20);
            $table->string('Address1',150);
            $table->string('Address2',150);
            $table->string('Mobile',150);
            $table->string('Email',150);
            $table->string('Pincode',150);
            $table->string('City',150);
            $table->string('State',150);
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
        Schema::dropIfExists('vendor_details');
    }
}
