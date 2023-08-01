<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_masters', function (Blueprint $table) {
            $table->id();
            $table->string('DriverName',30);
            $table->string('VendorName',5);
            $table->string('License',30);
            $table->date('LicenseExp');
            $table->string('Address1',255);
            $table->string('Address2',522);
            $table->string('City',10);
            $table->string('Pincode',10);
            $table->string('State',10);
            $table->string('Phone',15);
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
        Schema::dropIfExists('driver_masters');
    }
}
