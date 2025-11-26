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
        Schema::dropIfExists('teachers');
        Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('t_id')->unique();
                $table->string('email')->unique();
                $table->string('nic')->unique();
                $table->date('dob')->nullable();
                $table->string('gender');
                $table->string('mobile', 15);
                $table->text('address')->nullable();

                $table->string('nic_front')->nullable();
                $table->string('nic_back')->nullable();

                $table->string('username')->unique();
                $table->string('password');

                $table->foreignId('grade_id')->constrained()->onDelete('cascade');

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
