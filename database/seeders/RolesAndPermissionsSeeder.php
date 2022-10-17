<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            'users.view',
            'users.create',
            'users.update',
            'users.delete',
        ];
        $roles = [
            'super_admin',
            'admin',
            'user'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        Role::findByName('super_admin')->givePermissionTo($permissions);
    }
}
