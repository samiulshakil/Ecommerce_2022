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
            'slug' => 'admin.dashboard',
        ]);

        $moduleRole = Module::create(['name'=> 'Role Management']);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Access Role',
            'slug' => 'admin.roles.index',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Create Role',
            'slug' => 'admin.roles.create',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Edit Role',
            'slug' => 'admin.roles.edit',
        ]);

        Permission::create([
            'module_id' => $moduleRole->id,
            'name' => 'Delete Role',
            'slug' => 'admin.roles.destroy',
        ]);

        //User Management
        $moduleUser = Module::create(['name'=> 'User Management']);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Access User',
            'slug' => 'admin.users.index',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Create User',
            'slug' => 'admin.users.create',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Edit User',
            'slug' => 'admin.users.edit',
        ]);

        Permission::create([
            'module_id' => $moduleUser->id,
            'name' => 'Delete User',
            'slug' => 'admin.users.destroy',
        ]);
    }
}
