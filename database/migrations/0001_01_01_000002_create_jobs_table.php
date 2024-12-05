<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age'); // Menambahkan kolom 'age'
            $table->enum('gender', ['male', 'female']);
            $table->string('disease');
            $table->string('room');
            $table->enum('status', ['in-treatment', 'discharged'])->default('in-treatment');
            $table->string('doctor')->nullable(); // Menambahkan kolom doctor (nullable)
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
