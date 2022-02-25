<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'siswa_id' => $this->faker->randomNumber(3, true),
            'nis' => $this->faker->randomNumber(5, true),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'jenis_kelamin' => $this->faker->words('L', 'P'),
            'kelas' => $this->faker->sentence(1),
            'jurusan' => $this->faker->sentence(1),
            'alamat' => $this->faker->text(20, 100),
            'telepon' => $this->faker->randomNumber(5, true)
        ];
    }
}
