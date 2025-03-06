<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private $locales=[
        "ar",
        "en"
        ];
        
    private $themes=[
        "dark",
        "light"
        ];
    private $logos=[
        "users/profile/iuaGCBQPBogDs6CJO32TL9a9pjOicfXPVxdUvCFv.jpg",
        "users/profile/ScXaxxmbA4GtXkcv8OjydPJWyzAZYBUcX6WNw9hv.png",
        "users/profile/VhAEWvsL7Dte3ojr7NQHQkEv0dRcYyktQYithAfN.jpg",
        null
        ];
        

    public function definition(): array
    {
        return [
            // 'name' => fake()->name(),
            'phone' => fake()->unique()->phoneNumber(),
            'locale' => fake()->randomElement($this->locales),
            'theme' => fake()->randomElement($this->themes),
            'logo' => fake()->randomElement($this->logos),

        ];
    }
  
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */

}
