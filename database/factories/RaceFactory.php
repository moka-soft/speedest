<?php

namespace Database\Factories;

use App\Models\Race;
use App\Models\RaceType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    protected $model = Race::class;

    public function definition()
    {
        return [
            'name' => $this->race(),
            'type_id' => RaceType::factory()->create()->id,
            'date' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d')
        ];
    }

    private function race()
    {
        return collect([
            'The Big Five Marathon', 'The Dipsea Race', 'Niagara Falls Marathon', 'Star Wars Half Marathon',
            'Vienna City Marathon', 'We Ran It: French Riviera Marathon', 'Ultra Trail du Mont Blanc',
            'Sea Wheeze Half Marathon', 'Moscow Marathon', 'Inca Trail Marathon', 'Jungfrau Marathon', '13-17 The Majors',
            'Galapagos Marathon', 'Mount Everest Marathon', 'We Ran It: Marathon du Médoc', 'Two Oceans Race',
            'North Pole Marathon', 'Volcano Marathon', 'Western States 100', 'Eiger Ultra Trail', 'Kilimanjaro Marathon',
            'Antarctic Ice Marathon', 'Borneo International Marathon', 'Melbourne Half Marathon', 'The Red Bull 400', 'Outback Marathon',
            'Maratón de Quito', 'Bahamas Marathon', 'Maui Oceanfront Marathon', 'Creemore Vertical Challenge',
            'Satara Hill Half Marathon', 'Waiheke Half Marathon', 'Oman Desert Marathon', 'Bagan Temple Marathon',
            'Cruce de los Andes', 'Sao Paulo Marathon', 'Seychelles Eco Friendly Marathon', 'Mongolia Sunrise to Sunset',
            'Mongolia Sunrise to Sunset', 'Phuket Island Marathon', 'We Ran It: Hood To Coast Relay', 'Italy Coast to Coast',
            'Napa Valley to Sonoma Half Marathon', 'Barcelona Marathon', 'City2Surf'
        ])->random();
    }
}
