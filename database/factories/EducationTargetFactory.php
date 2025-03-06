<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EducationTargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        return [
            
          "name"=>fake()->randomElement(["صف اول","صف ثاني","صف ثالث","صف رابع","صف خامس","صف سادس","صف سابع","صف ثامن","صف تاسع","صف عاشر","صف حادي عشر","ثانوية عامة",]),
     
         
        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */



}
