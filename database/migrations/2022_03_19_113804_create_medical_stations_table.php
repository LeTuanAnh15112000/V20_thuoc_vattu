<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medical_center');
            $table->foreign('id_medical_center')->references('id')->on('medical_centers');
            $table->string('ten_tram_y_te',100);
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
        Schema::dropIfExists('medical_stations');
    }
}
