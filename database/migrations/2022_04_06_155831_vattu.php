<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vattu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('danhmucvattu', function(Blueprint $table){
            $table->id();
            $table->string('tenvattu');
            $table->string('mavattu');
            $table->string('nhomvattu');
            $table->integer('soluong');
            $table->string('hangsohuu');
            $table->string('dongia');
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
        Schema::dropIfExists('danhmucvattu');
    }
}
