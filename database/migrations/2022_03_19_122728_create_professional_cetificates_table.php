<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalCetificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_cetificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cadres');
            $table->foreign('id_cadres')->references('id')->on('cadres');   
            $table->string('so_cchn',15);
            $table->string('ten_cchn');
            $table->date('ngay_cap_cchn');
            $table->string('don_vi_cap_cchn',150);
            $table->date('thoi_gian')->nullable();
            $table->integer('trang_thai');
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
        Schema::dropIfExists('professional_cetificates');
    }
}
