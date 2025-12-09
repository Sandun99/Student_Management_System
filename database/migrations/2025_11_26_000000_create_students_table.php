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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reg_no')->unique();
            $table->date('dob')->nullable();
            $table->string('nic')->nullable()->unique();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('password')->nullable();

            $table->foreignId('grade_id')
                ->nullable()
                ->constrained('grades')
                ->onDelete('set null');

            $table->foreignId('course_id')
                ->nullable()
                ->constrained('courses')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
