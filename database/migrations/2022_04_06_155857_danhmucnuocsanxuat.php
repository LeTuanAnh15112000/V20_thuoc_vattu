<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Danhmucnuocsanxuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhmucnuocsanxuat', function(Blueprint $table){
            $table->id();
            $table->string('tennuocsanxuat')->nullable();
            $table->string('tenviettat')->nullable();
            $table->string('diachi')->nullable();
            $table->string('email')->nullable();
            $table->string('masothue')->nullable();
            $table->string('website')->nullable();
            $table->string('id_tramyte')->nullable();
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
        Schema::dropIfExists('danhmucnuocsanxuat');
    }
}
