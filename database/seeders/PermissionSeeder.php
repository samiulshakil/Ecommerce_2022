<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleDashboard = Module::create(['name'=> 'Admin Dashboard']);

        Permission::create([
            'module_id' => $moduleDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'access-dashboard',
        ]);

        $moduleRole = Module::create(['name'=> 'Role Management']);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Access Role',
            'slug' => 'access-role',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Create Role',
            'slug' => 'create-role',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Edit Role',
            'slug' => 'edit-role',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Delete Role',
            'slug' => 'delete-role',
        ]);

        //User Management
        $moduleUser = Module::create(['name'=> 'User Management']);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Access User',
            'slug' => 'access-user',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Create User',
            'slug' => 'create-user',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Edit User',
            'slug' => 'edit-user',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Delete User',
            'slug' => 'delete-user',
        ]);
    }
}
