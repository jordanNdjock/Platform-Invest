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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Liam Jordan',
            'email' => 'test@gmail.com',
            'password' => 'minou123'
        ]);
        for($i = 0;$i<6;$i++){
            \App\Models\Mining_Bot::factory()->create([
                'nom' => 'BOT_VIP'.$i,
                'niveau_requis' => 'VIP'.$i
            ]);
        }

        
    }
}
