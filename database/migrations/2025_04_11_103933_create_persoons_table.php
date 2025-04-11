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
        Schema::create('persoons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_persoon_id');
            $table->string('voornaam', 255);
            $table->string('tussenvoegsel', 255)->nullable();
            $table->string('achternaam', 255);
            $table->string('roepnaam', 255);
            $table->boolean('is_volwassen');
            $table->boolean('is_active');
            $table->text('opmerking')->nullable();
            $table->dateTime('datum_aangemaakt');
            $table->dateTime('datum_gewijzigd');
            $table->timestamps();

            $table->foreign('type_persoon_id')->references('id')->on('type_persoon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persoons');
    }
};
