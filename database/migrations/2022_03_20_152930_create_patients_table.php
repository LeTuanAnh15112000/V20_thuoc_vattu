<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_health_facility');
            $table->foreign('id_health_facility')->references('id')->on('health_facilities');
            $table->string('ma_dinh_danh_v20',13)->nullable()->unique();
            $table->integer('loai_benh_nhan');
            $table->string('ho_va_ten');
            $table->date('ngay_sinh');
            $table->integer('gioi_tinh');
            $table->unsignedBigInteger('id_ethnic');
            $table->foreign('id_ethnic')->references('id')->on('ethnics');
            $table->string('sdt',20)->unique()->nullable();
            $table->string('cmnd',12)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('hk_ma_tinh');
            $table->integer('hk_ma_huyen');
            $table->integer('hk_ma_xa');
            $table->text('hk_dia_chi');
            $table->integer('tt_ma_tinh');
            $table->integer('tt_ma_huyen');
            $table->integer('tt_ma_xa');
            $table->text('tt_dia_chi');
            $table->string('ma_hgd',10)->unique();
            $table->string('don_vi_cong_tac')->nullable();
            $table->string('quoc_tich');
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
        Schema::dropIfExists('patients');
    }
}
