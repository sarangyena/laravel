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
            $table->string('pay_id')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('employee_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('userName')->nullable();
            $table->string('week_id')->nullable();
            $table->string('month_id')->nullable();
            $table->string('year_id')->nullable();
            $table->string('week')->nullable();
            $table->string('name')->nullable();
            $table->string('job')->nullable();
            $table->string('rate')->nullable();
            $table->string('days')->nullable()->default(0);
            $table->string('late')->nullable()->default(0);
            $table->string('salary')->nullable()->default(0);
            $table->string('rph')->nullable();
            $table->string('hrs')->nullable()->default(0);
            $table->string('otpay')->nullable()->default(0);
            $table->string('holiday')->nullable()->default(0);
            $table->string('philhealth')->nullable()->default(0);
            $table->string('sss')->nullable()->default(0);
            $table->string('advance')->nullable()->default(0);
            $table->string('gross')->nullable()->default(0);
            $table->string('deduction')->nullable()->default(0);
            $table->string('net')->nullable()->default(0);
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
