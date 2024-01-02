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
        Schema::create('mining__bot_payments', function (Blueprint $table) {
            $table->id();
            $table->enum('bot_payé',['oui','non'])->default('non');
            $table->float('montant_bot',12);
            $table->foreignId('users_id');
            $table->foreignId('mining_bots_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mining__bot_payments');
    }
};
