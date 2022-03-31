<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->randomNumber(5, true),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
