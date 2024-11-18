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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_type_id');
            $table->unsignedBigInteger('subject_course_id');
            $table->integer('duration'); // Duration in minutes
            $table->integer('total_questions');
            $table->unsignedBigInteger('user_id'); // Assumes `user_id` links to a user or instructor
            $table->timestamps();

            // Foreign keys
            $table->foreign('exam_type_id')->references('id')->on('exam_types')->onDelete('cascade');
            $table->foreign('subject_course_id')->references('id')->on('subject_courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
