<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryProofMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_proof_masters', function (Blueprint $table) {
            $table->id();
            $table->string('ProofCode','20');
            $table->string('ProofName','20');
            $table->string('Pdr','5')->nullable();
            $table->string('Active','5')->nullable();
            $table->string('Default','5')->nullable();
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
        Schema::dropIfExists('delivery_proof_masters');
    }
}
