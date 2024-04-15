<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'create']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTo('edit', 'delete', 'create');
        $role_gerente = Role::create(['name' => 'gerente']);
        $role_gerente->givePermissionTo('edit', 'create');
        $role_admin = Role::create(['name' => 'user']);
        $role_admin->givePermissionTo();
    }
}
