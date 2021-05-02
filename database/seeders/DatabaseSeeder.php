<?php

namespace Database\Seeders;

use App\Models\RaceType;
use Database\Factories\RaceTypeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        RaceTypeFactory::types()->each(function ($type) {
            $distance = collect([1000, 2500, 3500, 8000])->random() * rand(1,5);
            RaceType::create([
                'name' => "$distance $type",
                'distance' => $distance
            ]);
        });
    }
}
