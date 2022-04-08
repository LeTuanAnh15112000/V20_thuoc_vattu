<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThuoctrongthanhlythuocThuochethan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuoctrongthanhlythuocthuochethan', function( Blueprint $table){
            $table->id();
            $table->string('sophieu');
            $table->string('mathuoc');
            $table->string('nguoilap');
            $table->integer('soluogton');
            $table->integer('soluongyeucau');
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
        Schema::dropIfExists('thuoctrongthanhlythuocthuochethan');
    }
}
