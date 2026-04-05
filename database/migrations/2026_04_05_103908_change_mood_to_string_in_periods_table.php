<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('periods', function (Blueprint $table) {
            // Mengubah kolom mood menjadi string secara eksplisit
            $table->string('mood')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periods', function (Blueprint $table) {
            // Kembalikan ke integer jika ingin rollback (tapi biasanya kita biarkan string saja)
            $table->integer('mood')->nullable()->change();
        });
    }
};
