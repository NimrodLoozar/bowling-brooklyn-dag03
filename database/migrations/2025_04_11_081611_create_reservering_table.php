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
        Schema::create('reservering', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persoon_id');
            $table->unsignedBigInteger('openingstijd_id');
            $table->unsignedBigInteger('baan_id');
            $table->unsignedBigInteger('pakketoptie_id')->nullable();
            $table->string('reserveringsstatus');
            $table->string('reserveringsnummer');
            $table->date('datum');
            $table->integer('aantaluren');
            $table->time('begintijd');
            $table->time('eindtijd');
            $table->integer('aantalvolwassenen');
            $table->integer('aantalkinderen')->nullable();
            $table->timestamps();

            $table->foreign('persoon_id')->references('id')->on('persoon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservering');
    }
};
