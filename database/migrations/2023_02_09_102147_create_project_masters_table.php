<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_masters', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectName',20);
            $table->string('ProjectUrl',20);
            $table->string('ProjectIcon',20);
            $table->string('isActive',20);
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
        Schema::dropIfExists('project_masters');
    }
}
