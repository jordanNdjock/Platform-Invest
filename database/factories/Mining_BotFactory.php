<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Mining_BotFactory extends Factory
{
   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nom' =>fake()->name(),
           'strategie' =>fake()->text(),
           'niveau_requis' => rand(0,6),
           'cout' => rand(1,100000),   
           'montant_fourni' => rand(1,100000), 
        ];
    }
}
