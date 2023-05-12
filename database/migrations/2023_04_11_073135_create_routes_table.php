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
        Schema::create('routes', function (Blueprint $table) {
            $table->id('idroute');
            $table->string('nomroute')->unique();
            $table->unsignedBigInteger('idvilledep');
            $table->foreign('idvilledep')->references('idville')->on('villes');
            $table->unsignedBigInteger('idvillearrive');
            $table->foreign('idvillearrive')->references('idville')->on('villes');
            $table->integer('distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
