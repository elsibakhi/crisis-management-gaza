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

class OpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     

//  opinions 

            Opinion::factory()->count(100)->state(function (array $attributes) {
                // لكل مؤسسة سيتم ربط موقع جديد
                return [
                    'dummy_user_id' => DummyUser::factory(),
                ];
            })->create();














     
    }
}
