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
            $table->enum('student_type', ['new', 'transferee', 'existing']);  // Add student_type
            $table->string('full_name');
            $table->string('address');
            $table->string('email');
            $table->string('number');
            $table->string('school_level');
            $table->string('strand')->nullable();
            $table->string('course')->nullable();
            $table->string('student_picture_path');
            $table->string('student_picture_name');
            $table->string('grades_copy_path');
            $table->string('grades_copy_name');
            $table->timestamps();
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