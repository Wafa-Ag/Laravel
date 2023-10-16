<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ForumPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence,
            'body' => $this->faker->paragraph(30),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray())
        ];
    }
}
