<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissons = [
            'create-listing',
            'update-listing',
            'delete-listing',
            'view-listing',
            'vew-users',
            'delete-users',
            'update-users',
        ];
        foreach ($permissons as $permisson) {
            Permission::create([
                'name' => $permisson,
            ]);
        }
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $userRole->syncPermissions([
            'create-listing',
            'update-listing',
            'delete-listing',
            'view-listing',
            'vew-users',
        ]);
        $adminRole->syncPermissions($permissons);
        $user->assignRole($adminRole);
    }
}
