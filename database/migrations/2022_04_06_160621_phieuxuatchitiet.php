<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phieuxuatchitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phieuxuatchitiet', function( Blueprint $table){
            $table->id();
            $table->string('sophieu');
            $table->foreignId('mathuoc')->constrained('danhmuchanghoa');
            $table->string('solo');
            $table->string('handung');
            $table->integer('thanhtien');
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
        Schema::dropIfExit('phieuxuatchitiet');
    }
}
