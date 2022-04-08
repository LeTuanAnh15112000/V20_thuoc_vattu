<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'department_of_health']);
        Role::create(['name' => 'medical_center']);
        Role::create(['name' => 'medical_station']);

        // $permissionC_User = Permission::create(['name' => 'create user']);
        // $permissionU_User = Permission::create(['name' => 'update user']);
        // $permissionR_User = Permission::create(['name' => 'read user']);
        // $permissionD_User = Permission::create(['name' => 'delete user']);

        // $roleAdmin->givePermissionTo(['create user', 'update user', 'read user', 'delete user']);
        
        $userAdmin = User::find(1);
        $userAdmin->assignRole('admin');

        $userSoYTe = User::find(2);
        $userSoYTe->assignRole('department_of_health');


        $userTrungTamYTe = User::find(3);
        $userTrungTamYTe->assignRole('medical_center');

        $userTramYTe = User::find(4);
        $userTramYTe->assignRole('medical_station');

        $userMyLong = User::find(5);
        $userMyLong->assignRole('medical_station');
    }
}
