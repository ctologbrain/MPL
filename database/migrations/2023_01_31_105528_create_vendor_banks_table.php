<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_banks', function (Blueprint $table) {
            $table->id();
            $table->string('Vid',11);
            $table->string('BankName',20);
            $table->string('BranchName',30);
            $table->string('BranchAddress',150);
            $table->string('NameOfAccount',30);
            $table->string('AccountType',20);
            $table->string('AccountNo',20);
            $table->string('IfscCode',20);
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
        Schema::dropIfExists('vendor_banks');
    }
}
