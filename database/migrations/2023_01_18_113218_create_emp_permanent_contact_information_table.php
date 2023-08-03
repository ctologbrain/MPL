<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpPermanentContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_permanent_contact_information', function (Blueprint $table) {
            $table->id();
            $table->string('EmpId','11');
            $table->string('Address1','20')->nullable();
            $table->string('Address2','20')->nullable();
            $table->string('State','20')->nullable();
            $table->string('City','20')->nullable();
            $table->string('Pincode','20')->nullable();
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
        Schema::dropIfExists('emp_permanent_contact_information');
    }
}
