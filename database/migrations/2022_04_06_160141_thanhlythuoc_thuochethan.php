<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThanhlythuocThuochethan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thanhlythuocthuochethan', function( Blueprint $table){
            $table->id();
            $table->integer('sophieu');
            $table->string('nguoilapphieu');
            $table->string('ngaylapphieu');
            $table->string('ghichu');
            $table->string('trangthai');
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
        Schema::dropIfExists('thanhlythuocthuochethan');
    }
}
