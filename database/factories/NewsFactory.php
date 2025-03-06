<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


        

    public function definition(): array
    {
        return [
         
            'title' => fake()->realText(70),
            'news' => fake()->realText(400),
           'created_at' => fake()->dateTimeBetween('now', '+15 days'),


        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */

}
