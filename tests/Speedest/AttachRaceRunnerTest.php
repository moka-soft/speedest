<?php

namespace Tests\Speedest;

use App\Http\Livewire\CreateRunner;
use App\Models\Race;
use App\Models\RaceType;
use App\Models\Runner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AttachRaceRunnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_runner_can_be_attach_race()
    {
        // Create actors
        $runner = Runner::factory()->create();
        $race = Race::factory()->create([
            'type_id' => RaceType::factory()->create()->id
        ]);

        // Attach race
        $runner->attachRace($race);

        // Assert
        $this->assertInstanceOf(Race::class, $runner->races()->first());
    }

    public function test_if_runner_canot_be_attach_race_on_the_same_day()
    {
        // Create actors and data
        $runner = Runner::factory()->create();
        $type = RaceType::factory()->create();

        $someDate = date('Y-m-d');

        $raceData = [
            'type_id' => $type->id,
            'date' => $someDate
        ];

        // Create races on the same-day
        $race1 = Race::factory()->create($raceData);
        $race2 = Race::factory()->create($raceData);

        // Try attach
        try {
            $runner->attachRace($race1);
            $runner->attachRace($race2);
        }catch (\Exception $exception){
            //Assert
            $this->assertEquals("Runner has a race on the same-day", $exception->getMessage());
        }
    }
}
