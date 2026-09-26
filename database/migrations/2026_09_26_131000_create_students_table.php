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

            $table->string('nis', 30)->unique();
            $table->string('nisn', 30)->nullable()->unique();

            $table->string('name');
            $table->enum('gender', ['L', 'P']);

            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('phone', 30)->nullable();

            $table->foreignId('class_id')
                ->nullable()
                ->constrained('school_classes')
                ->nullOnDelete();

            $table->foreignId('major_id')
                ->constrained('majors')
                ->restrictOnDelete();

            $table->boolean('status')->default(true);

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
