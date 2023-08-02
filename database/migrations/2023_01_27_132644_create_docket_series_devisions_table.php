<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocketSeriesDevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docket_series_devisions', function (Blueprint $table) {
            $table->id();
            $table->string('Series_ID','20');
            $table->string('Branch_ID','20');
            $table->string('Sr_From','20');
            $table->string('Sr_To','20');
            $table->string('Qty','20');   
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
        Schema::dropIfExists('docket_series_devisions');
    }
}
