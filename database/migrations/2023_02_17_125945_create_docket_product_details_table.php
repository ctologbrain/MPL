<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocketProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docket_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('Docket_Id');
            $table->integer('D_Product');
            $table->integer('Packing_M');
            $table->integer('Qty');
            $table->integer('Is_Volume');
            $table->integer('Actual_Weight');
            $table->integer('Charged_Weight');
          
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
        Schema::dropIfExists('docket_product_details');
    }
}
