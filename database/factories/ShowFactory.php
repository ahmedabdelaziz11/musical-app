<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(), 
            'date' => $this->faker->dateTime(), 
            'venue_id' => Venue::pluck('id')[$this->faker->numberBEtween(1,Venue::count() -1)], 
            'artist_id' => Artist::pluck('id')[$this->faker->numberBEtween(1,Artist::count() -1)], 
        ];
    }
}
