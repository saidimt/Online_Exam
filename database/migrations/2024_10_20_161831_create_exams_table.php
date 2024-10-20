<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('exam_name'); // Name of the exam, e.g., "Basic Airport Operation"
            $table->text('question'); // The exam question
            $table->string('option_a'); // Option A
            $table->string('option_b'); // Option B
            $table->string('option_c'); // Option C
            $table->string('option_d'); // Option D
            $table->string('correct_answer'); // Correct answer (A, B, C, or D)
            $table->timestamps(); // To record created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
