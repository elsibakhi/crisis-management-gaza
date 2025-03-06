<?php

namespace Database\Seeders;

use App\Models\Complaint;

use App\Models\DummyUser;
use App\Models\InstitutionData;

use App\Models\Location;

use App\Models\Note;

use App\Models\Profile;
use App\Models\Service;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WorkingDay;


class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

     

            // institutions

            //accepted food  institutions with services
       User::factory()
        ->count(20)
        ->institution()
        
        ->has(Profile::factory()->count(1), 'profile')
        ->has(InstitutionData::factory()->food()->accepted()->count(1)->state(function (array $attributes) {
            // لكل مؤسسة سيتم ربط موقع جديد
            return [
                'location_id' => Location::factory(),
            ];
        })
      
 
        , 'institutionData')
        ->has(WorkingDay::factory()->count(6)->sequence(
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
            ))
        ->has(
            Service::factory()->count(10)->institution()
            ->has(WorkingDay::factory()->count(4)->sequence(
                ['day' => 'saturday'],
                ['day' => 'sunday'],
                ['day' => 'monday'],
                ['day' => 'tuesday'],
   
                ))
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
            }),"complaints")
            , 'services')
        ->create();
            // accepted education  institutions with services
       User::factory()
        ->count(20)
        ->institution()
        
        ->has(Profile::factory()->count(1), 'profile')
        ->has(InstitutionData::factory()->education()->accepted()->count(1)->state(function (array $attributes) {
            // لكل مؤسسة سيتم ربط موقع جديد
            return [
                'location_id' => Location::factory(),
            ];
        })
       
 
        , 'institutionData')
        ->has(WorkingDay::factory()->count(6)->sequence(
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
            ))
        ->has(
            Service::factory()->count(10)->institution()
            ->has(WorkingDay::factory()->count(4)->sequence(
                ['day' => 'saturday'],
                ['day' => 'sunday'],
                ['day' => 'monday'],
                ['day' => 'tuesday'],
   
                ))
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
            }),"complaints")
            , 'services')
        ->create();
            //accepted health  institutions with services
       User::factory()
        ->count(20)
        ->institution()
        
        ->has(Profile::factory()->count(1), 'profile')
        ->has(InstitutionData::factory()->health()->accepted()->count(1)->state(function (array $attributes) {
            // لكل مؤسسة سيتم ربط موقع جديد
            return [
                'location_id' => Location::factory(),
            ];
        })
  
 
        , 'institutionData')

        ->has(WorkingDay::factory()->count(6)->sequence(
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
            ))
        ->has(
            Service::factory()->count(10)->institution()
            ->has(WorkingDay::factory()->count(4)->sequence(
                ['day' => 'saturday'],
                ['day' => 'sunday'],
                ['day' => 'monday'],
                ['day' => 'tuesday'],
   
                ))
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
            }),"complaints")
            , 'services')
        ->create();

   
  // unaccepted  institutions

       User::factory()
        ->count(20)
        ->institution()
        ->has(Profile::factory()->count(1), 'profile')
        ->has(InstitutionData::factory()->count(1)->state(function (array $attributes) {
            // لكل مؤسسة سيتم ربط موقع جديد
            return [
                'location_id' => Location::factory(),
            ];
        }) 
        
        , 'institutionData')
        ->has(WorkingDay::factory()->count(6)->sequence(
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
            ))
        ->create();
        
         // unverified  institutions
        User::factory()
        ->count(15)
        ->unverified()
        ->institution()
        ->has(Profile::factory()->count(1), 'profile')
        ->has(InstitutionData::factory()->accepted()->count(1)->state(function (array $attributes) {
            // لكل مؤسسة سيتم ربط موقع جديد
            return [
                'location_id' => Location::factory(),
            ];
        })
        
        , 'institutionData')
        ->has(WorkingDay::factory()->count(6)->sequence(
            ['day' => 'saturday'],
            ['day' => 'sunday'],
            ['day' => 'monday'],
            ['day' => 'tuesday'],
            ['day' => 'wednesday'],
            ['day' => 'thursday'],
            ['day' => 'friday'],
            ))
            ->create();






     
    }
}
