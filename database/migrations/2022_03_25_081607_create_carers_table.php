<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_health_facility');
            $table->foreign('id_health_facility')->references('id')->on('health_facilities');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->string('ten_ncs');
            $table->date('nam_sinh_ncs');
            $table->string('sdt_ncs',20)->unique();
            $table->string('email_ncs')->unique();
            $table->string('cmnd_ncs',12)->unique();
            $table->string('quan_he_voi_benh_nhan',100);
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
        Schema::dropIfExists('carers');
    }
}
