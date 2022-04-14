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
            $table->foreignId('danhmucthuoc')->constrained('danhmucthuoc');
            $table->foreignId('danhmucvattu')->constrained('danhmucvattu');
            $table->foreignId('tenloaithuoc')->constrained('phanloaithuoc');
            $table->foreignId('danhsachnhacungcap')->constrained('danhmucnhacungcap');
            $table->foreignId('danhsachhangsanxuat')->constrained('danhmuchangsanxuat');
            $table->foreignId('danhsachnuocsanxuat')->constrained('danhmucnuocsanxuat');
            $table->foreignId('danhsachduongdung')->constrained('danhmucduongdung');
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
