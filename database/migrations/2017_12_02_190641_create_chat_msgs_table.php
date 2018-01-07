<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatMsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_msgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chat_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('staff_id')->nullable();
            $table->string('msg')->nullable();
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
        Schema::dropIfExists('chat_msgs');
    }
}
