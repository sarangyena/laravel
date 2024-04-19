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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('hired');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('employee_id')->references('id')->on('employees')->cascadeOnDelete();
            $table->unsignedBigInteger('week_id');
            $table->string('userName')->unique();
            $table->string('week')->nullable();
            $table->string('name');
            $table->string('job');
            $table->string('rate');
            $table->string('days')->nullable();
            $table->string('late')->nullable();
            $table->string('salary')->nullable();
            $table->string('rph');
            $table->string('hrs')->nullable();
            $table->string('otpay')->nullable();
            $table->string('holiday')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('advance')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
