<?php

namespace Database\Factories;

use App\Models\RaceType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceTypeFactory extends Factory
{
    protected $model = RaceType::class;

    public function definition()
    {
        $distance = collect([1000, 2500, 3500, 8000])->random() * rand(1,5);

        return [
            'name' => $distance . ' meters ' . $this->type(),
            'distance' => $distance,
        ];
    }

    private function type()
    {
        return collect([
            'hurdles', 'team race', 'race walk', 'Medley relay',
            'Marathon road relay', 'Standing high jump', 'Standing long jump',
            'Standing triple jump', 'pound weight throw'
        ])->random();
    }
}
