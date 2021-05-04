<?php

namespace Tests\Speedest;

use App\Http\Livewire\CreateRace;
use App\Models\Race;
use App\Models\RaceType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateRaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_race_can_be_create()
    {
        $race = Race::factory()->make([
            'type_id' =>  RaceType::factory()->create()->id
        ]);

        $component = Livewire::test(CreateRace::class)
            ->set('name',  $race->name)
            ->set('type', $race->type->id)
            ->set('date', $race->date)
            ->call('submit');

        $this->assertEquals($race->name, $component->name);
        $this->assertEquals($race->type->id, $component->type);
        $this->assertEquals($race->date, $component->date);
    }
}
