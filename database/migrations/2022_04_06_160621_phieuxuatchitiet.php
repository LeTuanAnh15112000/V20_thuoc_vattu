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
            $table->string('tenthuoc');
            $table->string('soluong')->nullable();
            $table->string('hamluong')->nullable();
            $table->string('dangtrinhbay')->nullable();
            $table->string('dangtebao')->nullable();
            $table->string('donvi')->nullable();
            $table->integer('dongia')->nullable();
            $table->string('hangsanxuat')->nullable();
            $table->string('nuocsanxuat')->nullable();
            $table->integer('handung');
            $table->foreignId('sophieu')->constrained('phieuxuat');
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
