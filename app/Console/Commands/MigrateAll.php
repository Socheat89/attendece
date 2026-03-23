<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:all {--connections=* : Specify connections to migrate (defaults to mysql,mysql_testing)} {--seed : Run the database seeders after migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations on multiple database connections in sequence';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $connections = $this->option('connections');
        if (empty($connections)) {
            $connections = ['mysql', 'mysql_testing'];
        }

        foreach ($connections as $connection) {
            $this->info("Migrating connection: $connection");
            $status = Artisan::call('migrate', [
                '--database' => $connection,
                '--force' => true,
            ]);
            $this->line(Artisan::output());
            if ($status !== 0) {
                $this->error("Migration failed for connection $connection (exit code $status)");
                return $status;
            }

            if ($this->option('seed')) {
                $this->info("Seeding connection: $connection");
                $seedStatus = Artisan::call('db:seed', [
                    '--database' => $connection,
                    '--force' => true,
                ]);
                $this->line(Artisan::output());
                if ($seedStatus !== 0) {
                    $this->error("Seeding failed for connection $connection (exit code $seedStatus)");
                    return $seedStatus;
                }
            }
        }

        $this->info('All specified connections migrated'.($this->option('seed') ? ' and seeded' : '').'.');
        return 0;
    }
}
