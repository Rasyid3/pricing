<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('umk_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('sub_job_id');
            $table->timestamps();

            $table->foreign('umk_id')->references('id')->on('umk');
            $table->foreign('job_id')->references('id')->on('job');
            $table->foreign('sub_job_id')->references('id')->on('sub_job');
        });
    }

    public function down()
    {
        Schema::dropIfExists('person');
    }
}
;
