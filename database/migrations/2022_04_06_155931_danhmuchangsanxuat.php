<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Danhmuchangsanxuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhmuchangsanxuat', function(Blueprint $table){
            $table->id();
            $table->string('tenhangsanxuat');
            $table->string('tenviettat');
            $table->string('diachi');
            $table->string('email');
            $table->string('masothue');
            $table->string('website');
            $table->string('id_tramyte');
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
        Schema::dropIfExists('danhmuchangsanxuat');
    }
}
