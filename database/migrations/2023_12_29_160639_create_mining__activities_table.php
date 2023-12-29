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
        Schema::create('mining_activity', function (Blueprint $table) {
            $table->id();
            $table->string('montant_minee');
            $table->foreignId('users_id')->constrained();
            $table->foreignId('mining_bot_id')->constrained(
                table: 'mining_bot', indexName: 'id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mining_activity');
    }
};
