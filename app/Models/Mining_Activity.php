<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mining_Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'bot_mining_id',
        'user_id',
        'Montant_miné',
        'Bot_payé'
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
