<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'pidum']);
        Permission::create(['name' => 'bin']);
        Permission::create(['name' => 'kejati']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'pidum']);
        $role->givePermissionTo($role->name);

        $role = Role::create(['name' => 'bin']);
        $role->givePermissionTo($role->name);

        $role = Role::create(['name' => 'kejati']);
        $role->givePermissionTo($role->name);
    }
}
