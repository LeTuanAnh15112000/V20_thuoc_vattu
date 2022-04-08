<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_health_facility');
            $table->foreign('id_health_facility')->references('id')->on('health_facilities');
            $table->integer('ma_tinh_dvct');
            $table->integer('ma_huyen_dvct');
            $table->integer('ma_xa_dvct');
            $table->string('dia_chi_dvct');
            $table->string('ten_dvct');
            $table->string('ten_viet_tat');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc')->nullable();
            $table->integer('trang_thai_xoa')->default(0);
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
        Schema::dropIfExists('work_units');
    }
}
