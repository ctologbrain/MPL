<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrsDeliveryTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drs_delivery_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('docket','10');
            $table->string('type','10');
            $table->integer('ActualPieces');
            $table->integer('DelieveryPieces');
            $table->integer('Weight');
            $table->date('Time');
            $table->integer('ProofName');
            $table->string('RecName','30');
            $table->string('phone','15');
            $table->string('ProofDetail','50');
            $table->integer('NdrReason');
            $table->string('ndr_remark','255');
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
        Schema::dropIfExists('drs_delivery_transactions');
    }
}
