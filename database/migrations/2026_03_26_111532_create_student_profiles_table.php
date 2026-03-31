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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            
            // YEH LINE BOHOT ZAROORI HAI:
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->text('home_address')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('previous_school')->nullable();
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
