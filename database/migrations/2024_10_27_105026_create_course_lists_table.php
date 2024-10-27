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
        Schema::create('course_lists', function (Blueprint $table) {
            $table->id();
            $table->string('course_name',50); // Name of the exam, e.g., "Basic Airport Operation"
            $table->string('course_code',10); 
            $table->string('course_duration',20); 
            $table->foreignId('user_id'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lists');
    }
};
