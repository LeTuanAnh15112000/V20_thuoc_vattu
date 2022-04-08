<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Danhmuchanghoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhmuchanghoa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matramyte')->constrained('health_facilities');
            $table->foreignId('tenthuoc')->constrained('danhmucthuoc');
            $table->foreignId('tenvattu')->constrained('danhmucvattu');
            $table->foreignId('tenloaithuoc')->constrained('phanloaithuoc');
            $table->foreignId('makho')->constrained('danhmuckho');
            $table->foreignId('nhacungcap')->constrained('danhmucnhacungcap');
            $table->foreignId('hangsanxuat')->constrained('danhmuchangsanxuat');
            $table->foreignId('nuocsanxuat')->constrained('danhmucnuocsanxuat');
            $table->foreignId('duongdung')->constrained('danhmucduongdung');
            $table->integer('dongia');
            $table->string('nguonthanhtoan');
            $table->string('donvi');
            $table->string('hamluong');
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
        Schema::dropIfExists('danhmuchanghoa');
    }
}
