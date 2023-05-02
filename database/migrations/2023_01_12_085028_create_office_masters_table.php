<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_masters', function (Blueprint $table) {
            $table->id();
            $table->string('OffcieType',10);
            $table->string('ParentOffice',10);
            $table->string('GSTNo',15);
            $table->string('OfficeCode',15);
            $table->string('OfficeName',15);
            $table->string('ContactPerson',15);
            $table->text('OfficeAddress');
            $table->string('State',15);
            $table->string('City',15); 
            $table->string('Pincode',15);
            $table->string('MobileNo',15);
            $table->string('PhoneNo',15);
            $table->string('PersonalNo',15);
            $table->string('EmailID',20);

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
        Schema::dropIfExists('office_masters');
    }
}
