<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_department_of_health')->nullable();
            $table->foreign('id_department_of_health')->references('id')->on('department_of_healths');
            $table->unsignedBigInteger('id_medical_center')->nullable();
            $table->foreign('id_medical_center')->references('id')->on('medical_centers');
            $table->unsignedBigInteger('id_medical_station')->nullable();
            $table->foreign('id_medical_station')->references('id')->on('medical_stations');
            $table->string('ten_co_so_y_te',100);
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
        Schema::dropIfExists('health_facilities');
    }
}
