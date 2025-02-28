<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->char('user_uuid', 36)->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable()->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('contact_no')->nullable();
            $table->text('address')->nullable();
            $table->string('lrn')->unique()->nullable();
            $table->string('grade_level')->nullable();
            $table->string('strand')->nullable();
            $table->string('parent_guardian')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
