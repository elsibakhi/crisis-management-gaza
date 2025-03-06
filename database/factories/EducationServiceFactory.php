<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EducationServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            
          "status"=>fake()->randomElement(["charged","free"]),
          "cost"=> function (array $attributes) {
            if($attributes["status"] == "free") {
              
              return 0;
            }else{

              return fake()->numberBetween(50,500);
            }
            }
         
        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



}
