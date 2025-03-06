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

class ServiceContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   



// accepted Service contributions

            Service::factory()->count(50)->contribution()
            ->has(WorkingDay::factory()->count(4)->sequence(
                ['day' => 'saturday'],
                ['day' => 'sunday'],
                ['day' => 'monday'],
                ['day' => 'tuesday'],
   
                ))
                
            ->has(Contribution::factory()->accepted()->count(1)->state(function (array $attributes) {
                // لكل مؤسسة سيتم ربط موقع جديد
                return [
                    'dummy_user_id' => DummyUser::factory(),
                ];
            }),"contribution")
            ->has(Note::factory()->count(fake()->numberBetween(10,100))->state(function (array $attributes) {
                // لكل مؤسسة سيتم ربط موقع جديد
                return [
                    'dummy_user_id' => DummyUser::factory(),
                ];
            }),"notes")
            ->has(Complaint::factory()->count(fake()->numberBetween(10,100))->state(function (array $attributes) {
                // لكل مؤسسة سيتم ربط موقع جديد
                return [
                    'dummy_user_id' => DummyUser::factory(),
                ];
            }),"complaints")->create();


// unaccepted Service contributions

            Service::factory()->count(50)->contribution()
            ->has(WorkingDay::factory()->count(4)->sequence(
                ['day' => 'saturday'],
                ['day' => 'sunday'],
                ['day' => 'monday'],
                ['day' => 'tuesday'],
   
                ))
                
            ->has(Contribution::factory()->count(1)->state(function (array $attributes) {
                // لكل مؤسسة سيتم ربط موقع جديد
                return [
                    'dummy_user_id' => DummyUser::factory(),
                ];
            }),"contribution")
           ->create();














     
    }
}
