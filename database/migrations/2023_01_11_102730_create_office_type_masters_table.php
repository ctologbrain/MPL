<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeTypeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_type_masters', function (Blueprint $table) {
            $table->id();
            $table->string('OfficeTypeCode','20');
            $table->string('OfficeTypeName','30');
            $table->string('AllowBookingCommission','30');
            $table->string('AllowDeliveryCommission','3');
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
        Schema::dropIfExists('office_type_masters');
    }
}
