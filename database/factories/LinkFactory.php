<?php

namespace Database\Factories;

use App\Models\EducationService;
use App\Models\EducationSpecialization;
use App\Models\EducationTarget;
use App\Models\FoodService;
use App\Models\HealthField;
use App\Models\HealthService;
use App\Models\InstitutionData;
use App\Models\Location;
use App\Models\ServiceExtension;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

 
        
      
    public function definition(): array
    {

     return [
         'title' =>fake()->realTextBetween(20,100), // توليد موقع
         'link' =>fake()->unique()->url(), // توليد موقع
         'description' =>fake()->realTextBetween(20,400), // توليد موقع
         'copied' => fake()->numberBetween(0, 1000), // وصول عشوائي
        

    
     ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



     public function contribution(): static
     {
         return $this->state(fn (array $attributes) => [
             'status' => "contribution",
         
         ]);
     }
     public function admin(): static
     {
        return $this->state(fn (array $attributes) => [
            'status' => "admin",
        
        ]);
     }




}
