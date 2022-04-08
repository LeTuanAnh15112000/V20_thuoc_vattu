<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieunhapthuocchitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieunhapthuocchitiet', function( Blueprint $table){
            $table->id();
            $table->string('sophieu');
            $table->string('nguoilapphieu');
            $table->string('tenthuoc');
            $table->foreignId('mathuoc')->constrained('danhmuchanghoa');
            $table->string('solo');
            $table->string('handung');
            $table->string('trangthai');
            $table->string('tennguon');
            $table->foreignId('manguon')->constrained('danhmucnguon');
            $table->integer('soluong');
            $table->string('ngaynhap');
            $table->integer('thanhtien');
            $table->string('ghichu');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('phieunhapthuocchitiet');
    }
}
