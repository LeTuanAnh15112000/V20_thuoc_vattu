<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bienbankiemke extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bienbankiemke', function( Blueprint $table){
            $table->id();
            $table->foreignId('sobienban')->constrained('thuocvattutrongbienbankiemke');
            $table->string('thoigiantu');
            $table->string('thoigianden');
            $table->integer('soluongsosach');
            $table->integer('soluongthucte');
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
        Schema::dropIfExists('bienbankiemke');
    }
}
