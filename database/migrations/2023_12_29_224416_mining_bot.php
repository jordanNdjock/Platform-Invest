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
        Schema::create('mining__bots', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('strategie');
            $table->string('niveau_requis');
            $table->float('cout',12);
            $table->float('montant_fourni',12,2);
            $table->string('durée_minage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mining__bots');
    }
};
