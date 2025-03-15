<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

                //charts
                Permission::create(['name' => 'view most accessible services chart']);
                Permission::create(['name' => 'view services with the most complaints chart']);
                Permission::create(['name' => 'view services with the most notes chart']);
                Permission::create(['name' => 'view opinions rating chart']);
                Permission::create(['name' => 'view contributions status chart']);
                Permission::create(['name' => 'view number of news chart']);
                Permission::create(['name' => 'view most copied links chart']);
                Permission::create(['name' => 'view institutions with most complaints chart']);


        // admin of institutions
        Permission::create(['name' => 'changing the enrollment status of institutions']);
        Permission::create(['name' => 'view institutions']);
        Permission::create(['name' => 'create institutions']);
        Permission::create(['name' => 'edit institutions']);
        Permission::create(['name' => 'delete institutions']);

        Role::create(['name' => 'admin of institutions'])
            ->givePermissionTo([
                'changing the enrollment status of institutions',
                'view institutions',
                'create institutions',
                'edit institutions',
                'delete institutions',
                'view institutions with most complaints chart',
      
                ]);


     
   
        // admin of notes
        Permission::create(['name' => 'view notes']);
        Permission::create(['name' => 'delete notes']);
     
        Role::create(['name' => 'admin of notes'])
            ->givePermissionTo([
                'view notes',
                'delete notes',
             
                'view services with the most notes chart',
         
                ]);


        // admin of complaints
        Permission::create(['name' => 'view complaints']);
        Permission::create(['name' => 'delete complaints']);
   
        Role::create(['name' => 'admin of complaints'])
            ->givePermissionTo([
                'view complaints',
                'delete complaints',
                
                'view services with the most complaints chart',
                'view institutions with most complaints chart',
                ]);
        // admin of opinions
        Permission::create(['name' => 'view opinions']);
        Permission::create(['name' => 'delete opinions']);
        Permission::create(['name' => 'change opinions status']);
      
        Role::create(['name' => 'admin of opinions'])
            ->givePermissionTo([
                'view opinions',
                'delete opinions',
                'change opinions status',
              
                'view opinions rating chart',
              
                ]);
      
        // admin of news
        Permission::create(['name' => 'view news']);
        Permission::create(['name' => 'delete news']);
        Permission::create(['name' => 'create news']);
        Permission::create(['name' => 'edit news']);
       
        Role::create(['name' => 'admin of news'])
            ->givePermissionTo([
                'view news',
                'delete news',
                'create news',
                'edit news',
                'view number of news chart',
               
                ]);

        // admin of links
        Permission::create(['name' => 'view links']);
        Permission::create(['name' => 'delete links']);
        Permission::create(['name' => 'create links']);
        Permission::create(['name' => 'edit links']);
       
        Role::create(['name' => 'admin of links'])
            ->givePermissionTo([
                'view links',
                'delete links',
                'create links',
                'edit links',
              
                'view most copied links chart',
                ]);

        // admin of contributions
        Permission::create(['name' => 'view service contributions']);
        Permission::create(['name' => 'view link contributions']);
        Permission::create(['name' => 'view a contribution']);
        Permission::create(['name' => 'delete contributions']);
        Permission::create(['name' => 'change contributions status']);
   
        Role::create(['name' => 'admin of contributions'])
            ->givePermissionTo([
                'view service contributions',
                'view link contributions',
                'view a contribution',
                'delete contributions',
                'change contributions status',
             
                'view contributions status chart',
                ]);

        // admin of services
        Permission::create(['name' => 'view services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);
        Permission::create(['name' => 'hide services']);
        Permission::create(['name' => 'restore services']);
        Permission::create(['name' => 'create services']);
        
        Role::create(['name' => 'admin of services'])
            ->givePermissionTo([
                'view services',
                'delete services',
                'hide services',
                'restore services',
                'edit services',
                'view most accessible services chart',
                'view services with the most complaints chart',
                'view services with the most notes chart',
              "create services"
                ]);

        // admin of admins
        Permission::create(['name' => 'view admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'delete admins']);
        Permission::create(['name' => 'create admins']);
        
        Role::create(['name' => 'admin of admins'])
            ->givePermissionTo([
                'view admins',
                'delete admins',
                'edit admins',
                'create admins',
               
              
                ]);

        
        // admin of communication 
       
        Permission::create(['name' => 'communication with institutions']);
       
        
        Role::create(['name' => 'admin of communication'])
            ->givePermissionTo([
                'communication with institutions',
                'view institutions',
             
                ]);

         

        // institution
      
        Permission::create(['name' => 'edit institution data']);
       

     

        Role::create(['name' => 'institution'])
            ->givePermissionTo([
                'create services',
                'restore services',
                'hide services',
            
                'edit institution data',
                'view services',
                'delete services',
                'edit services',
                'view complaints',
                'view notes',
                'view most accessible services chart',
                'view services with the most complaints chart',
                'view services with the most notes chart',
          
                ]);


       


        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();




        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::whereNot("name","edit institution data")->get());
    }
}