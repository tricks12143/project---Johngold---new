<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id');
            $table->string('staff_lname')->nullable();
            $table->string('staff_fname')->nullable();
            $table->string('staff_mname')->nullable();
            $table->string('staff_email')->nullable();
            $table->string('staff_img')->nullable();
            $table->integer('staff_level')->nullable();
            $table->string('change_code')->nullable();
            $table->string('staff_stat')->nullable();
            $table->string('staff_ol_stat')->nullable();
            $table->string('staff_user')->nullable();
            $table->string('staff_pass')->nullable();
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
        Schema::dropIfExists('staff');
    }
}
