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
        Schema::create('examination_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_id'); // Name of the exam, e.g., "Basic Airport Operation"
            $table->text('question'); // The exam question
            $table->string('option_a'); // Option A
            $table->string('option_b'); // Option B
            $table->string('option_c'); // Option C
            $table->string('option_d'); // Option D
            $table->string('correct_answer'); // Correct answer (A, B, C, or D)
            $table->foreignId('user_id'); // Correct answer (A, B, C, or D)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examination_questions');
    }
};
