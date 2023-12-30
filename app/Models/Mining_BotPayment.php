<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mining_BotPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'bot_payé',
        'montant_bot',
        'users_id',
        'mining_bots_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mining_bot(): BelongsTo
    {
        return $this->belongsTo(Mining_Bot::class);
    }
}
