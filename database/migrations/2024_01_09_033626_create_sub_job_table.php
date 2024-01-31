<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubJobTable extends Migration
{
    public function up()
    {
        Schema::create('sub_job', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle');
            $table->unsignedBigInteger('job_id');
            $table->decimal('additional_wage', 10, 2);
            $table->decimal('tunjangan_jabatan', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('job');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_job');
    }
}
;
