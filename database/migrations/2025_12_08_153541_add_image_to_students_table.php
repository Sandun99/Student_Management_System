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
        Schema::table('students', function (Blueprint $table) {
            $table->after('password', function ($table) {
                $table->string('profile')->nullable();
                $table->string('nic_front')->nullable();
                $table->string('nic_back')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('profile');
            $table->dropColumn('nic_front');
            $table->dropColumn('nic_back');
        });
    }
};
