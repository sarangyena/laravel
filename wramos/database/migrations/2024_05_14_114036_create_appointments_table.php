<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appointment_id');
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->string('services');
            $table->string('allServices');
            $table->string('date');
            $table->float('amount');
            $table->float('total');
            $table->boolean('minified')->default(false);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE appointments ADD recommendation LONGBLOB");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
