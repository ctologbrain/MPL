<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_masters', function (Blueprint $table) {
            $table->id();
            $table->string('RouteName','30');
            $table->integer('Source');
            $table->integer('Destination');
            $table->string('TransitDays','10');
            $table->integer('CreatedBy');
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
        Schema::dropIfExists('route_masters');
    }
}
