<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpPersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('EmpId','11');
            $table->date('DateOfBirth');
            $table->string('AadhaarNo','20')->nullable();
            $table->string('DrivingLicence','20')->nullable();
            $table->date('DrivingLicenceExp')->nullable();
            $table->string('IDCardNo','20')->nullable();
            $table->string('PanNo','20')->nullable();
            $table->string('PassportNo','20')->nullable();
            $table->date('PassportExpDate')->nullable();
            $table->string('Guardian','20')->nullable();
            $table->string('GuardianName','20')->nullable();
            $table->string('PersonalMobileNo','20')->nullable();
            $table->string('PersonalPhoneNo','20')->nullable();
            $table->string('PersonalEmail','20')->nullable();
            $table->string('Gender','20')->nullable();
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
        Schema::dropIfExists('emp_personal_information');
    }
}
