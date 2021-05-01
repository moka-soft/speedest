<?php

namespace Database\Factories;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Factories\Factory;

class RunnerFactory extends Factory
{
    protected $model = Runner::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'birth_date' => $this->faker->date(),
        ];
    }
}
