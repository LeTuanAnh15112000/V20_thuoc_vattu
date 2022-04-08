<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cadres');
            $table->foreign('id_cadres')->references('id')->on('cadres');
            $table->string('email')->unique();
            $table->text('anh_dai_dien')->nullable();
            $table->integer('trang_thai')->default(1);
            $table->string('ten_tai_khoan')->unique();
            $table->string('password');
            $table->integer('dark_mode')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
