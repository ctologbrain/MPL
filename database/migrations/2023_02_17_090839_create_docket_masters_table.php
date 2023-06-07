<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocketMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docket_masters', function (Blueprint $table) {
            $table->id();
            $table->string('Docket_No','11');
            $table->dateTime('Booking_Date');
            $table->integer('Office_ID');
            $table->integer('Booking_Type');
            $table->integer('Delivery_Type');
            $table->string('Is_DACC','11');
            $table->string('Is_DOD','11');
            $table->string('DODAmount','11');
            $table->string('Is_COD','11');
            $table->string('CODAmount','11');
            $table->string('Ref_No','11');
            $table->string('PO_No','11');
            $table->string('Origin_Pin','11');
            $table->string('Dest_Pin','11');
            $table->string('Cust_Id','11');
            $table->string('Consigner_Id','11');
            $table->string('Consignee_Id','11');
            $table->string('Remark','255');
            $table->string('Booked_By',11);
            $table->dateTime('Booked_At');
            
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
        Schema::dropIfExists('docket_masters');
    }
}
