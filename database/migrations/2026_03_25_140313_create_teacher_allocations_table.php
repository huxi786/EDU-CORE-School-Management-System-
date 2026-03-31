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
        Schema::create('teacher_allocations', function (Blueprint $table) {
            $table->id();
            
            // The 3-Way Bridge (Teacher + Class + Subject)
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('school_class_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();

            // Ek teacher ek hi class mein same subject 2 dafa nahi parha sakta (Security Rule)
            $table->unique(['teacher_id', 'school_class_id', 'subject_id'], 'unique_allocation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_allocations');
    }
};
