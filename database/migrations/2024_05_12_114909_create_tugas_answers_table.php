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
        Schema::create('tugas_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->constrained('tugases');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('kelompok_id')->constrained();
            $table->longText('rumusan_masalah')->nullable();
            $table->string('file_presentasi')->nullable();
            $table->string('file_laporan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_answers');
    }
};
