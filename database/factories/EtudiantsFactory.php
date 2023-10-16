<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\VilleModel;

class EtudiantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => User::factory(),
            'nom_etudiant' => $this->faker->sentence,
            'adress' => $this->faker->sentence,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'date_de_naissance' => $this->faker->date,
            'ville_id' => VilleModel::factory(),
        ];
    }
}
