<?php

namespace Database\Factories;

use App\Models\InstitutionData;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class InstitutionDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $types=[
        "food",
        "education",
        "health",
        ];
        
    private $status=[
        // "accepted",
        "rejected",
        "pending",
        ];

        
      
    public function definition(): array
    {
        return [
     
           
            'type' => fake()->randomElement($this->types),
            'status' => fake()->randomElement($this->status),
            'start_time' => $startTime = fake()->time(),
            'end_time' => fake()->time('H:i:s', strtotime($startTime) + rand(2 * 3600, 8 * 3600)),

            'description' =>function (array $attributes) {
                return "تُعد هذه المؤسسة من المؤسسات الرائدة في مجال ال ".__($attributes['type'])." تسعى إلى تقديم خدمات مبتكرة وتحقيق تأثير إيجابي في المجتمع من خلال التركيز على تطوير هذا المجال.";
                },

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
     public function food(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "food",
         
         ]);
     }
     public function education(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "education",
         
         ]);
     }
     public function health(): static
     {
         return $this->state(fn (array $attributes) => [
             'type' => "health",
         
         ]);
     }


  


}
