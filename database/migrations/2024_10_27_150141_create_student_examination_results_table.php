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
        Schema::create('student_examination_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');       // Reference to the student
            $table->unsignedBigInteger('exam_id')->nullable();   // Reference to exam
            $table->unsignedBigInteger('quiz_id')->nullable();   // Reference to quiz
            $table->unsignedBigInteger('test_id')->nullable();   // Reference to test
            $table->unsignedBigInteger('instructor_id');         // Reference to instructor
            $table->float('score');                              // Student score
            $table->enum('assessment_type', ['quiz', 'test', 'exam']);  // Type of assessment
            $table->timestamps();

            // Foreign keys
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_examination_results');
    }
};
