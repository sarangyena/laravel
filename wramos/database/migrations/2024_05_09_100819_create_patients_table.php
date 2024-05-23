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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('pType')->default('ONLINE');
            $table->string('first');
            $table->string('last');
            $table->string('address');
            $table->string('phone');
            $table->string('gender');
            $table->string('bday');
            $table->string('email')->unique();
            $table->string('reference')->nullable();
            $table->string('services')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->boolean('isAdded')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
