<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payments', function (Blueprint $table) {
            $table->id();
            $table->string('cust_id',11);
            $table->string('PaymentMode',11)->nullable();
            $table->string('CreditPeriod',11)->nullable();
            $table->string('AllowRoundOff',11)->nullable();
            $table->string('TariffType',11)->nullable();
            $table->string('IncludeFlights',11)->nullable();
            $table->string('ApplyTAT',11)->nullable();
            $table->string('AutoMIS',11)->nullable();
            $table->string('IgnorePicku',11)->nullable();
            $table->string('IgnoreDelivery',11)->nullable();
            $table->string('InvoiceFormat',11)->nullable();
            $table->string('SMSOnBilling',11)->nullable();
            $table->string('RCM',11)->nullable();
            $table->string('RCMExempted',11)->nullable();
            $table->string('GSTApp',11)->nullable();
            $table->string('Air',11)->nullable();
            $table->string('Road',11)->nullable();
            $table->string('Train',11)->nullable();
            $table->string('Water',11)->nullable();
            $table->string('GSTInclusive',11)->nullable();
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
        Schema::dropIfExists('customer_payments');
    }
}
