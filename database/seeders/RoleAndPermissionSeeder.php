<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use \App\Helpers\Permission as PermissionHelper;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // manual cache reset
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // create permissions
        foreach (PermissionHelper::ALL as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // create roles
        Role::create(['name' => 'administrador', 'guard_name' => 'web']);
        Role::create(['name' => 'cliente', 'guard_name' => 'web']);

        // administrator permissions
        $adminRole = Role::findByName('administrador');
        foreach (PermissionHelper::ADMIN as $permission) {
            $adminRole->givePermissionTo($permission);
        }

        // customer permissions
        $clienteRole = Role::findByName('cliente');
        foreach (PermissionHelper::CUSTOMER as $permission) {
            $clienteRole->givePermissionTo($permission);
        }
    }
}
