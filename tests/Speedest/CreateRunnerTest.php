<?php

namespace Tests\Speedest;

use App\Http\Livewire\CreateRunner;
use App\Models\Runner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateRunnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_runner_can_be_create()
    {
        $runner = Runner::factory()->make();

        $component = Livewire::test(CreateRunner::class)
            ->set('name',  $runner->name)
            ->set('cpf', $runner->cpf)
            ->set('birth_date', $runner->birth_date)
            ->call('submit');

        $this->assertEquals($runner->name, $component->name);
        $this->assertEquals($runner->cpf, $component->cpf);
        $this->assertEquals($runner->birth_date, $component->birth_date);
    }
}
