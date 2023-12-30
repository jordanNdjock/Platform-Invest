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
        Schema::create('mining__activities', function (Blueprint $table) {
            $table->id();
            $table->string('montant_minee');
            $table->enum('bot_paye', ['1', '0'])->default('0')->nullable();
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
        Schema::dropIfExists('mining__activities');
    }
};
