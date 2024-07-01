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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('subject_code')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('instructor')->nullable();
            $table->string('schedule')->nullable();
            $table->double('prelims')->nullable();
            $table->double('midterms')->nullable();
            $table->double('pre_finals')->nullable();
            $table->double('finals')->nullable();
            $table->double('average_grade')->nullable();
            $table->string('remarks')->nullable();
            $table->date('date_taken')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
