<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhmucthuoc', function(Blueprint $table){
            $table->id();
            $table->string('tenthuoc')->nullable();
            $table->integer('soluong')->nullable();
            $table->string('hamluong')->nullable();
            $table->string('dangtrinhbay')->nullable();
            $table->string('dangtebao')->nullable();
            $table->string('donvi')->nullable();
            $table->string('dongia')->nullable();
            $table->string('hangsanxuat')->nullable();
            $table->string('nuocsanxuat')->nullable();
            $table->integer('handung')->nullable();
            $table->string('mathuoc')->nullable();
            $table->string('id_tramyte')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('danhmucthuoc');
    }
}
