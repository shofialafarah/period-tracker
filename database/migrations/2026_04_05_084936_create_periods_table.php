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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('start_date'); // Tanggal mulai mens
            $table->date('end_date'); // Tanggal selesai mens
            $table->integer('duration')->nullable(); // Selisih hari antara start_date dan end_date
            $table->string('mood')->nullable(); // Contoh: 'Happy', 'Sad', 'Irritable', dll.
            $table->integer('flow_intensity')->nullable(); // Intensitas aliran (misalnya: 1-10)
            $table->json('symptoms')->nullable(); // Contoh: ['kram', 'jerawat', 'sakit kepala', 'lelah']
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
