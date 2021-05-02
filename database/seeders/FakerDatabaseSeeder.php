<?php

namespace Database\Seeders;

use App\Models\Race;
use App\Models\RaceType;
use App\Models\Runner;
use Database\Factories\RaceFactory;
use Illuminate\Database\Seeder;

class FakerDatabaseSeeder extends Seeder
{
    public function run()
    {
        $types = RaceType::all();

        RaceFactory::races()->each(function ($race) use ($types) {
            Race::factory()->create([
                'name' => $race,
                'type_id' => $types->random()->id
            ]);
        });

        Runner::factory()->count(1500)->create();
    }
}
