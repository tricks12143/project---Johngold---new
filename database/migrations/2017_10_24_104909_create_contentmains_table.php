<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contentmains', function (Blueprint $table) {
            $table->increments('content_id');
            $table->string('content_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('type')->nullable();
            $table->string('defaultvalue')->nullable();
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
        Schema::dropIfExists('contentmains');
    }
}
