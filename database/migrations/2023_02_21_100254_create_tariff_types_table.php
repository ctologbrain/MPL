<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_types', function (Blueprint $table) {
            $table->id();
            $table->integer('Docket_Id');
            $table->string('is_gst','3');
            $table->string('ReceivedAmount','10');
            $table->string('ReferenceNumber','10');
            $table->string('Freight','11');
            $table->string('IGST','11');
            $table->string('CGST','11');
            $table->string('SGST','11');
            $table->string('TotalAmount','11');
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
        Schema::dropIfExists('tariff_types');
    }
}
