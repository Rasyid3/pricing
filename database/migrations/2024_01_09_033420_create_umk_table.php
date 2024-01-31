<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkTable extends Migration
{
    public function up()
    {
        Schema::create('umk', function (Blueprint $table) {
            $table->id();
            $table->string('regency');
            $table->decimal('wage', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umk');
    }
}
;
