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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('PersoonId')->constrained('people');
            $table->tinyInteger('OpeningstijdId')->nullable();
            $table->tinyInteger('BaanId')->nullable();
            $table->tinyInteger('PakketOptieId')->nullable();
            $table->string('ReserveringsStatus');
            $table->bigInteger('ReserveringsNummer');
            $table->date('datum');
            $table->integer('AantalUren');
            $table->time('BeginTijd');
            $table->time('EindTijd');
            $table->integer('AantalVolwassen');
            $table->integer('AantalKinderen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
