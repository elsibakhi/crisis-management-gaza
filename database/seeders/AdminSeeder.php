<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Contribution;
use App\Models\DummyUser;
use App\Models\InstitutionData;
use App\Models\Link;
use App\Models\Location;
use App\Models\News;
use App\Models\Note;
use App\Models\Opinion;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WorkingDay;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        //admins
        User::factory()
        ->count(50)
        ->has(Profile::factory()->count(1), 'profile')
        ->create();
    
    
        //link admins
        User::factory()
        ->count(10)
        ->has(Link::factory()->admin()->count(30), 'links')
        ->create();


        User::factory()
        ->count(10)
        ->unverified()
        ->has(Profile::factory()->count(1), 'profile')
            ->create();
     














     
    }
}
