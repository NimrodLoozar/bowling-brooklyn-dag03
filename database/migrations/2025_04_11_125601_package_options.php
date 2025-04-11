<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('PackageOptions', function (Blueprint $table) {
            $table->integer('Id')->primary();
            $table->string('Naam', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('PackageOptions');
    }
};