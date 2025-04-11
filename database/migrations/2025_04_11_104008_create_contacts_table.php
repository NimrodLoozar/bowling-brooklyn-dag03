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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PersoonId')->constrained('people')->onDelete('cascade');
            $table->string('mobiel', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->boolean('is_active');
            $table->text('opmerking')->nullable();
            $table->dateTime('datum_aangemaakt');
            $table->dateTime('datum_gewijzigd');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
