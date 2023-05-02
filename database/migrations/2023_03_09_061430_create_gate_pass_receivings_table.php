<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatePassReceivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate_pass_receivings', function (Blueprint $table) {
            $table->id();
            $table->integer('Gp_Rcv_Type');
            $table->integer('Rcv_Office');
            $table->date('Rcv_Date');
            $table->string('Supervisor','30')->nullable();
            $table->string('Docket','11');
            $table->integer('Rcv_Qty');
            $table->integer('PendingQty');
            $table->string('Remark','255')->nullable();
            $table->integer('Recieved_By');
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
        Schema::dropIfExists('gate_pass_receivings');
    }
}
