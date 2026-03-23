<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This seeder is no longer invoked by default (see DatabaseSeeder).
        // The RolePermissionSeeder now takes responsibility for creating the
        // initial super‑admin user, so the values here are only used when
        // executing this class explicitly (e.g. during manual debugging).

        // avoid creating a duplicate super admin record
        if (User::where('is_super_admin', true)->exists()) {
            $this->command->info('Super Admin already exists, skipping.');
            return;
        }

        User::create([
            'name' => 'Super Administrator',
            // match the default credentials used elsewhere
            'email' => 'superadmin@hrm.local',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_super_admin' => true,
            'is_active' => true,
        ]);
        
        $this->command->info('Super Admin seeded successfully: superadmin@hrm.local / password123');
    }
}
