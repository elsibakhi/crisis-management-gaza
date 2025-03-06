<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ContributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


        

    public function definition(): array
    {
        return [
           
            'justification' => fake()->realText(),
            'status' => fake()->randomElement(['rejected','pending']),
         

        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */

     public function accepted(): static
     {
         return $this->state(fn (array $attributes) => [
             'status' => "accepted",
         ]);
     }

     




}
