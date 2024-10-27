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
        Schema::create('examination_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_id'); // Name of the exam, e.g., "Basic Airport Operation"
            $table->text('instruction_1'); // The exam question
            $table->string('instruction_2'); // instruction A
            $table->string('instruction_3'); // instruction B
            $table->string('instruction_4')->nullable(); // instruction C
            $table->string('instruction_5')->nullable(); // instruction D
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examination_instructions');
    }
};
