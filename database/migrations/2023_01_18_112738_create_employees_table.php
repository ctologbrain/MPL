<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('EmployeeCode','20');
            $table->string('EmployeeName','20');
            $table->string('ReportingPerson','20');
            $table->string('OfficeName','4');
            $table->string('DepartmentName','4');
            $table->string('DesignationName','4');
            $table->date('JoiningDate');
            $table->date('LastWorkDate')->nullable();
            $table->string('OfficePhone','15')->nullable();
            $table->string('OfficeExt','15')->nullable();
            $table->string('OfficeMobileNo','15')->nullable();
            $table->string('OfficeEmailID','15')->nullable();


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
        Schema::dropIfExists('employees');
    }
}
