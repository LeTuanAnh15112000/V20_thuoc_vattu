<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitaminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitamins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_health_facility');
            $table->foreign('id_health_facility')->references('id')->on('health_facilities');
            $table->string('ten_vitamin');
            $table->integer('so_luong');
            $table->date('ngay_nhap');
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
        Schema::dropIfExists('vitamins');
    }
}
