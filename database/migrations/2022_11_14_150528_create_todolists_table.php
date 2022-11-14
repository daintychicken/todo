<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 10)->unsigned();
            $table->string('name', 40);
            $table->string('text', 255);
            $table->integer('status')->default(1);
            $table->date('limit_date');
            $table->date('completion_date');
            $table->timestamps();
            $table->softDeletes();

            // 外部キーを設定する
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolists');
    }
};
