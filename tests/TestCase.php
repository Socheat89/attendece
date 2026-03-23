<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;

abstract class TestCase extends BaseTestCase
{
    /**
     * Create the application with a clean route cache.
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        // remove any pre-generated route cache so that auth.php and friends
        // are always loaded during tests.  caching is useful in production but
        // the copy on disk can become stale during development and lead to
        // mysterious 404s inside tests (see GH issue).  explicitly delete it
        // before the framework bootstraps routes.
        $cached = $app->getCachedRoutesPath();
        if (file_exists($cached)) {
            @unlink($cached);
        }

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Prepare the application for testing.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // force sqlite in-memory database for tests so they run out-of-the-box
        // also override the env var because some commands rely on it
        putenv('DB_CONNECTION=sqlite');
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        // make sure no stale route cache interferes with our tests
        $this->artisan('route:clear');

        // run the migrations so the schema is available
        $this->artisan('migrate', ['--database' => 'sqlite']);
    }
}
