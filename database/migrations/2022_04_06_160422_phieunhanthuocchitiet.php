<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieunhanthuocchitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieunhanthuocchitiet', function( Blueprint $table){
            $table->id();
            $table->foreignId('mathuoc')->constrained('danhmuchanghoa');
            $table->string('sophieunhan');
            $table->string('solo');
            $table->integer('soluongyeucau');
            $table->integer('soluongnhan');
            $table->integer('thanhtien');
            $table->string('handung');
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
        Schema::dropIfExists('phieunhanthuocchitiet');
    }
}
