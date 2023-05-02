<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdrMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndr_masters', function (Blueprint $table) {
            $table->id();
            $table->string('ReasonCode','20');
            $table->string('ReasonDetail','20');
            $table->string('NDRReason','5')->nullable();
            $table->string('MobileReason','5')->nullable();
            $table->string('vrr','5')->nullable();
            $table->string('RTOReason','5')->nullable();
            $table->string('CustomerException','5')->nullable();
            $table->string('ReversePickup','5')->nullable();
            $table->string('InternalNDR','5')->nullable();
            $table->string('OffloadReason','5')->nullable();
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
        Schema::dropIfExists('ndr_masters');
    }
}
