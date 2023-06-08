<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsignorMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignor_masters', function (Blueprint $table) {
            $table->id();
            $table->string('CustId',11);
            $table->string('ServiceType',11)->nullable();
            $table->string('ConsignorName',30);
            $table->string('PickupChargesAmount',11)->nullable();
            $table->string('GSTNo',11)->nullable();
            $table->string('PANNo',11)->nullable();
            $table->string('Address1',100)->nullable();
            $table->string('Address2',100)->nullable();
            $table->string('City',30)->nullable();
            $table->string('Phone',15)->nullable();
            $table->string('Mobile',15)->nullable();
            $table->string('Email',20)->nullable();
            $table->string('PickupCharge',3)->nullable();
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
        Schema::dropIfExists('consignor_masters');
    }
}
