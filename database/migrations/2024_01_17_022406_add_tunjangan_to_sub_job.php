<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        public function up(): void
        {
            Schema::table('sub_job', function (Blueprint $table) {
                //
                $table->decimal('tunjangan_komunikasi', 10, 2)->nullable();
                $table->decimal('tunjangan_transportasi', 10, 2)->nullable();
                $table->decimal('tunjangan_makan', 10, 2)->nullable();
                $table->decimal('tunjangan_lembur', 10, 2)->nullable();
                $table->decimal('tunjangan_shift', 10, 2)->nullable();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('sub_job', function (Blueprint $table) {
                //
                $table->dropColumn('tunjangan_komunikasi');
                $table->dropColumn('tunjangan_transportasi');
                $table->dropColumn('tunjangan_makan');
                $table->dropColumn('tunjangan_lembur');
                $table->dropColumn('tunjangan_shift');
            });
        }
    };

