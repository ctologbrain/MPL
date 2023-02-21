<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocketInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docket_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('Docket_Id');
            $table->string('Type','11');
            $table->string('Invoice_No','11');
            $table->date('Invoice_Date','11');
            $table->string('Description','255');
            $table->string('Amount','11');
            $table->string('EWB_No','11');
            $table->Date('EWB_Date');
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
        Schema::dropIfExists('docket_invoice_details');
    }
}
