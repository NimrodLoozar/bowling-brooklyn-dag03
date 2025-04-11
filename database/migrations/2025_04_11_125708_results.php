<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Results', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->integer('SpelId');
            $table->integer('Aantalpunten')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Results');
    }
};