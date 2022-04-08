<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieunhanthuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieunhanthuoc', function( Blueprint $table){
            $table->id();
            $table->foreignId('sophieunhan')->constrained('phieunhanthuocchitiet');
            $table->string('ngaynhan');
            $table->string('ma_csyt_dutru');
            $table->string('ma_csyt_cungung');
            $table->integer('trangthai');
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
        Schema::dropIfExists('phieunhanthuoc');
    }
}
