<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EducationSpecializationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            
          "name"=>fake()->randomElement(["أدبي","علمي","عام","شرعي","تقني","تجاري"]),
     
         
        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



}
