<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployment_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_health_facility');
            $table->foreign('id_health_facility')->references('id')->on('health_facilities');
            $table->string('ten_dia_diem_trien_khai');
            $table->text('dia_chi_trien_khai');
            $table->integer('ma_tinh_trien_khai');
            $table->integer('ma_huyen_trien_khai');
            $table->integer('ma_xa_trien_khai');
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
        Schema::dropIfExists('deployment_locations');
    }
}
