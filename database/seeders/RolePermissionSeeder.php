<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Super Admin', 'Admin / HR', 'Employee'];

        foreach ($roles as $roleName) {
            Role::query()->firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // ensure there is a super admin account with known credentials
        $superAdmin = User::query()->firstOrNew([
            'email' => 'superadmin@hrm.local',
        ]);

        // fill or update fields in-case the record already exists
        $superAdmin->name = 'Super Admin';
        $superAdmin->password = Hash::make('password123');
        $superAdmin->email_verified_at = now();
        $superAdmin->is_active = true;
        $superAdmin->is_super_admin = true;
        $superAdmin->save();

        // make sure the role exists and assign it
        $superAdmin->syncRoles(['Super Admin']);
    }
}
