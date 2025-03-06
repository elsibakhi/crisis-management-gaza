<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FoodServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            
          "type"=>fake()->randomElement(["food_parcel","cooking","flour",'gas'])
         
        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



}
