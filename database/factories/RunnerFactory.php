<?php

namespace Database\Factories;

use App\Models\Runner;
use Illuminate\Database\Eloquent\Factories\Factory;

class RunnerFactory extends Factory
{
    use Faker;

    protected $model = Runner::class;

    public function definition()
    {
        $days = rand(1, 500);

        return [
            'name' => $this->faker->name,
            'code' => $this->faker->numerify('###########'),
            'birth_date' => $this->faker->date(),
            'created_at' => $this->randomizeDate($days),
            'updated_at' =>  $this->randomizeDate($days)
        ];
    }
}
