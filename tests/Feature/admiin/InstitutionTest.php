<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class InstitutionTest extends TestCase
{
    /**
     * A basic test example.
     */
    use RefreshDatabase;
    protected $seeder = RolesAndPermissionsSeeder::class;
    public function test_the_institution_with_institutions_index_returns_a_successful_response(): void
    {
        $institution_type="institutions";
       
        $user = User::factory()->create();
        $user->profile()->create([
            "locale"=>"en",
            "theme"=>"dark",
        ]);
        $user->givePermissionTo("view institutions");

           $response = $this->actingAs($user)->get('institution?type='.$institution_type);
          

        
        $response->assertViewIs("admin.institutions.index");
        $response->assertViewHas('institution_type', $institution_type);

    }
    public function test_the_institution_with_institutions_index_returns_a_403_status_when_not_has_permission_response(): void
    {
        $institution_type="institutions";
       
        $user = User::factory()->create();
        $user->profile()->create([
            "locale"=>"en",
            "theme"=>"dark",
        ]);
      

           $response = $this->actingAs($user)->get('institution?type='.$institution_type);
          

        
        $response->assertStatus(403);
      

    }
    public function test_the_institution_with_enrollments_index_returns_a_successful_response(): void
    {
        $institution_type="enrollments";
       
        $user = User::factory()->create();
        $user->profile()->create([
            "locale"=>"en",
            "theme"=>"dark",
        ]);
        $user->givePermissionTo("view institutions");

           $response = $this->actingAs($user)->get('institution?type='.$institution_type);
          

        
        $response->assertViewIs("admin.institutions.index");
        $response->assertViewHas('institution_type', $institution_type);

    }
    public function test_the_institution_with_enrollments_index_returns_a_403_status_when_not_has_permission_response(): void
    {
        $institution_type="enrollments";
       
        $user = User::factory()->create();
        $user->profile()->create([
            "locale"=>"en",
            "theme"=>"dark",
        ]);
      

           $response = $this->actingAs($user)->get('institution?type='.$institution_type);
          

        
        $response->assertStatus(403);
      

    }
 

}
