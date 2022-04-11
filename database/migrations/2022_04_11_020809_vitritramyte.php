<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vitritramyte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vitritramyte', function(Blueprint $table){
            $table->id();
            $table->string('matyt')->nullable();
            $table->string('tentyt')->nullable();
            $table->string('diachi')->nullable();
            $table->string('vido');
            $table->string('kinhdo')->nullable();
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
        Schema::dropIfExists('vitritramyte');
    }
}
