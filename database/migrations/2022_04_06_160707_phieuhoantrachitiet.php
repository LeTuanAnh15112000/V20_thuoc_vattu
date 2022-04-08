<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieuhoantrachitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieuhoantrachitiet', function( Blueprint $table){
            $table->id();
            $table->foreignId('mathuoc')->constrained('danhmuchanghoa');
            $table->string('sophieuhoantra');
            $table->string('sophieunhan');
            $table->integer('soluonghoantra');
            $table->integer('soluongduyet');
            $table->integer('thanhtien');
            $table->string('solo');
            $table->string('ngayhethan');
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
        Schema::dropIfExists('phieuhoantrachitiet');
    }
}
