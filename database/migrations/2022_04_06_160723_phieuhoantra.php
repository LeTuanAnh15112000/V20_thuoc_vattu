<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieuhoantra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieuhoantra', function( Blueprint $table){
            $table->id();
            $table->foreignId('sophieu')->constrained('phieuhoantrachitiet');
            $table->string('ngaylapphieu');
            $table->string('ngaychuyen');
            $table->integer('trangthai');
            $table->string('ma_csyt_hoantra');
            $table->string('ma_csyt_nhan');
            $table->string('makhonhan');
            $table->string('makhohoantra');
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
        Schema::dropIfExists('phieuhoantra');
    }
}
