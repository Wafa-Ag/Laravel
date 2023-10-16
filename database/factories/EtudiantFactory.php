<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Ville;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_etudiant' => $this->faker->name,
            'adress' => $this->faker->address,
            'phone' => $this->faker->unique->phoneNumber,
            'email' => $this->faker->unique->email,
            'date_de_naissance' => $this->faker->date,
            'ville_id' => $this->faker->randomElement(Ville::pluck('id')->toArray())
        ];
    }
}
