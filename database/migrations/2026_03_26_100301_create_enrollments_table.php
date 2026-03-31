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
        Schema::create('enrollments', function (Blueprint $table) {
       $table->id();
            
            // The Links
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('school_class_id')->constrained('school_classes')->onDelete('cascade');
            
            // Academic Details
            $table->string('roll_number')->nullable();
            $table->string('academic_year')->default(date('Y') . '-' . (date('Y') + 1)); // e.g., "2026-2027"
            
            $table->timestamps();

            // Enterprise Security Rule: A student can only be enrolled once per academic year
            $table->unique(['student_id', 'academic_year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
