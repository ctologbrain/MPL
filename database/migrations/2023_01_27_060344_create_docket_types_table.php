<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocketTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docket_types', function (Blueprint $table) {
            $table->id();
            $table->string('Code','20');
            $table->string('Title','20');
            $table->string('Cat_Id','20')->nullable();
            $table->string('Rate','20')->nullable();
            $table->string('Status','20')->nullable();
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
        Schema::dropIfExists('docket_types');
    }
}
