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
            $table->unsignedBigInteger('persoon_id');
            $table->string('mobiel', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->boolean('is_active');
            $table->text('opmerking')->nullable();
            $table->dateTime('datum_aangemaakt');
            $table->dateTime('datum_gewijzigd');
            $table->timestamps();

            $table->foreign('persoon_id')->references('id')->on('persoons');
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
