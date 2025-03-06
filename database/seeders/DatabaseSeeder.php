<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

  
        $this->call([
            RolesAndPermissionsSeeder::class,
            AddSuperAdmin::class,
            AdminSeeder::class,
            InstitutionSeeder::class,
            ServiceContributionSeeder::class,
            LinkContributionSeeder::class,
            NewsSeeder::class,
            OpinionSeeder::class,
           
   
        ]);


    }
}