<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // RolePermissionSeeder now creates the default super admin user
        // (along with the role records).  The SuperAdminSeeder class still
        // exists for manual use but is not invoked here, to avoid
        // duplicating the same account.
        $this->call([
            RolePermissionSeeder::class,
            HrCoreSeeder::class,
            SubscriptionSeeder::class,
        ]);
    }
}
