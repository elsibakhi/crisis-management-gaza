<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class HealthFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



     public function definition(): array
     {
         return [
             
          'name' => fake()->randomElement([
    "عيون", 
    "أطفال", 
    "نساء وولادة", 
    "طب عام", 
    "جراحة", 
    "أسنان", 
    "طب نفسي", 
    "جلدية", 
    "باطنية", 
    "روماتيزم"
]),

      
          
         ];
     }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



}
