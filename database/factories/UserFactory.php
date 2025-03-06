<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $roles=[
        "admin",
        "institution"
        ];
        

    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => "admin",
            'name' =>  fake()->name(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
   
        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    public function institution(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => "institution",
            'name' =>fake()->company(),
        ]);
    }

                public function configure()
            {
            return $this->afterMaking(function (User $user) {
            //
            })->afterCreating(function (User $user) {
                if($user->role=="institution"){
                    $user->roles()->attach(11);
                 
                }else{

                    $user->roles()->attach(fake()->randomElement([1,2,3,4,5,6,7,8,9,10,12]));
                }
            });
            }
}
