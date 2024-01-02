<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mining_Bot extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom',
      'strategie_minage',
      'niveau_requis',
      'cout',
      'montant_fourni',
      'durée_minage'
    ];

  
}
