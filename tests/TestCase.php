<?php

namespace :uc:vendor\:uc:package\Tests;

// use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Pyle\Webhooks\WebhooksServiceProvider;
use :uc:vendor\:uc:package\:uc:packageServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [
            // LivewireServiceProvi der::class,
            :uc:packageServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function defineEnvironment($app)
    {
        // Set app key for testing
        $app['config']->set('app.key', 'base64:' . base64_encode(
            \Illuminate\Support\Str::random(32)
        ));
    }

    /**
     * Define database migrations.
     *
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
