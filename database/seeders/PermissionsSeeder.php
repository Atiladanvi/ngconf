<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    static $CREATE_USER = 'create_user';

    static $LIST_USERS = 'list_users';

    public function run()
    {
        $role = Role::create(['name' => User::$ADMIN]);
        Role::create(['name' => User::$CUSTOMER]);

        $permission1 = Permission::create(['name' => self::$CREATE_USER]);
        $permission2 = Permission::create(['name' => self::$LIST_USERS]);

        $role->givePermissionTo($permission1);
        $role->givePermissionTo($permission2);
    }
}
