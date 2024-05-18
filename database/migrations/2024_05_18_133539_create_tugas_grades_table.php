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
        Schema::create('tugas_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_answer_id')->constrained();
            $table->string('nilai');
            $table->longText('feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_grades');
    }
};
