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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('t_id');
            $table->string('email');
            $table->string('nic');
            $table->date('dob');
            $table->string('gender');
            $table->string('mobile', 15)->nullable();
            $table->string('address');
            $table->string('username');
            $table->string('password');
            $table->foreignId('course_id');
            $table->foreignId('subject_id');
            $table->foreignId('grade_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
