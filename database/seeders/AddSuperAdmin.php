<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       $super_admin= User::create([
        
            'name' =>"Baraa ELsibkhi",
            'email' => 'baraa@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
       $super_admin->profile()->create([
        "locale"=>"ar",
        "theme"=>"dark"
       ]);

        $super_admin->assignRole('super-admin');
       
    }
}