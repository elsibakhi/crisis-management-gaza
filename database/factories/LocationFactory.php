<?php

namespace Database\Factories;

use App\Models\User;
use App\Traits\Regions;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
       
            'address' => fake()->address(),
            'region' => fake()->randomElement(Regions::allowed_regions()),
            'lat' => fake()->latitude(31.354918,31.377918),
            'lng' => fake()->longitude(34.29813,34.35813),

        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */

}
