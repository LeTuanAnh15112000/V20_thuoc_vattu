<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadres', function (Blueprint $table) {
            $table->id();
            $table->string('ma_dinh_danh_v20',13)->nullable()->unique();
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->tinyInteger('gioi_tinh');
            $table->string('sdt',20);
            $table->string('so_cmnd',12)->unique();
            $table->date('ngay_cap_cmnd');
            $table->string('noi_cap_cmnd');
            $table->unsignedBigInteger('id_work_unit')->nullable();
            $table->foreign('id_work_unit')->references('id')->on('work_units');
            $table->integer('ma_tinh_tt');
            $table->integer('ma_huyen_tt');
            $table->integer('ma_xa_tt');
            $table->text('dia_chi_tt');
            $table->integer('ma_tinh_hk');
            $table->integer('ma_huyen_hk');
            $table->integer('ma_xa_hk');
            $table->text('dia_chi_hk');
            $table->unsignedBigInteger('id_position')->nullable();
            $table->foreign('id_position')->references('id')->on('positions');
            $table->unsignedBigInteger('id_title')->nullable();
            $table->foreign('id_title')->references('id')->on('titles');
            $table->unsignedBigInteger('id_specialized')->nullable();
            $table->foreign('id_specialized')->references('id')->on('specializeds');
            $table->unsignedBigInteger('id_sub_specialized')->nullable();
            $table->foreign('id_sub_specialized')->references('id')->on('specializeds');
            $table->integer('tinh_trang_cong_tac')->nullable();
            $table->tinyInteger('loai_nhan_luc')->nullable();
            $table->tinyInteger('trang_thai_xoa')->default(0);
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
        Schema::dropIfExists('cadres');
    }
}
