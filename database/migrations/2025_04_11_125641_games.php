<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('Games', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->integer('PersoonId');
            $table->integer('ReserveringId');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Games');
    }
};