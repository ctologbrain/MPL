<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_masters', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyName',11)->nullable();
            $table->string('ParentCustomer',11)->nullable();
            $table->string('CustomerCode',11)->nullable();
            $table->string('CustomerName',11)->nullable();
            $table->string('GSTName',11)->nullable();
            $table->string('GSTNo',11)->nullable();
            $table->string('PANNo',11)->nullable();
            $table->string('TinNo',11)->nullable();
            $table->string('BillAt',11)->nullable();
            $table->string('BillingCycle',11)->nullable();
            $table->string('IndiaAccess',11)->nullable();
            $table->string('VirtualNumber',11)->nullable();
            $table->string('LoadImage',11)->nullable();
            $table->string('CRMExecutive',11)->nullable();
            $table->string('BillingPerson',11)->nullable();
            $table->string('ReferenceBy',11)->nullable();
            $table->string('CustomerCategory',11)->nullable();
            $table->string('CreditLimit',11)->nullable();
            $table->string('DepositAmount',11)->nullable();
            $table->string('DepositBy',11)->nullable();
            $table->string('Discount',11)->nullable();
            $table->string('BillSubmission',11)->nullable();
            $table->string('CustomerType',11)->nullable();
            $table->string('ServiceType',11)->nullable();

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
        Schema::dropIfExists('customer_masters');
    }
}
