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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PersoonId')->constrained('people')->onDelete('cascade');
            $table->string('Mobile', 20)->nullable();
            $table->string('Email', 255)->nullable();
            $table->boolean('IsActive');
            $table->text('Opmerking')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
