<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thuocvattutrongbienbankiemke extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('thuocvattutrongbienbankiemke', function( Blueprint $table){
            $table->id();
            $table->foreignId('mathuoc')->constrained('danhmuchanghoa');
            $table->string('sobienban');
            $table->string('handung');
            $table->integer('soluongsosach');
            $table->integer('soluongthucte');
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
        Schema::dropIfExists('thuocvattutrongbienbankiemke');
    }
}
