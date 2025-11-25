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
            $table->string('reg_no');
            $table->date('dob');
            $table->string('nic');
            $table->string('gender');
            $table->string('mobile');
            $table->string('address');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->foreignId('grade_id');
            $table->foreignId('course_id');
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
