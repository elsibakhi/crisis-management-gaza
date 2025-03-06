<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OpinionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


        

    public function definition(): array
    {
        return [
         
            'rating' => fake()->randomElement([1,2,3,4,5]),
            'status' => fake()->randomElement(["pending","accepted"]),
            'opinion' => fake()->realText(200),
         

        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */

}
