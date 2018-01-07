<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contentsubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->nullable();
            $table->integer('content_id')->nullable();
            $table->integer('content_name')->nullable();
            $table->string('the_content', 500)->nullable();
            $table->string('content_show', 1000)->nullable();
            $table->string('content_show_pages', 1000)->nullable();
            $table->string('num_of_items', 25)->nullable();
            $table->string('pagintaion', 25)->nullable();
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
        Schema::dropIfExists('contentsubs');
    }
}
