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
        Schema::create('portions', function (Blueprint $table) {
            $table->id('idportion');
            $table->integer('idroute');
            $table->foreign('idroute')->references('idroute')->on('routes');
            $table->integer('debut');
            $table->integer('fin');
            $table->integer('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portions');
    }
};
