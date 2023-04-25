<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrsDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drs_deliveries', function (Blueprint $table) {
            $table->id();
            $table->date('D_Date');
            $table->string('D_Number','10');
            $table->integer('O_KM');
            $table->integer('C_KM');
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
        Schema::dropIfExists('drs_deliveries');
    }
}
