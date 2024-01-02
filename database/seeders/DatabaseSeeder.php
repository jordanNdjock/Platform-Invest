<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $bot_montant_fourni = [
            90,171.85,546.875,1140.625,2450,5344.82,12068.965,25925.9259,40384.6154
        ];
        $bot_cout = [
            0,5500,17500,36000,73500,155000,350000,700000,1050000
        ];
        for($i = 0;$i<9;$i++){
            \App\Models\Mining_Bot::factory()->create([
                'nom' => 'BOT_VIP'.$i,
                'niveau_requis' => 'VIP'.$i,
                'strategie' => ($i == 0) ? 'Mine '.$bot_montant_fourni[$i].' XAF par jour sur 12 jours' : 'Mine '.$bot_montant_fourni[$i].' XAF par jour sur 1 an',
                'cout' => $bot_cout[$i],
                'montant_fourni' => $bot_montant_fourni[$i],
                'durée_minage' => ($i == 0 ) ? '12 jours' : '1 an',
            ]);
        }

        
    }
}
