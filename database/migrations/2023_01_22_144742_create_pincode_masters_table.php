<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePincodeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pincode_masters', function (Blueprint $table) {
            $table->id();
            $table->string('State','5');
            $table->string('city','5');
            $table->string('PinCode','5');
            $table->string('ARP','5')->nullable();
            $table->string('ODA','5')->nullable();
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
        Schema::dropIfExists('pincode_masters');
    }
}
