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
        Schema::create('mining_bot', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('strategie');
            $table->string('niveau_requis');
            $table->float('cout');
            $table->float('montant_fourni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mining_bot');
    }
};
