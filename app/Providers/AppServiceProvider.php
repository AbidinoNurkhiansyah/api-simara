<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Contracts\PernikahanRepositoryInterface::class,
            \App\Repositories\Eloquent\PernikahanRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\TempatIbadahRepositoryInterface::class,
            \App\Repositories\Eloquent\TempatIbadahRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\MadrasahRepositoryInterface::class,
            \App\Repositories\Eloquent\MadrasahRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\WakafRepositoryInterface::class,
            \App\Repositories\Eloquent\WakafRepository::class
        );

        $this->app->bind(
            \App\Repositories\Contracts\ProgramRepositoryInterface::class,
            \App\Repositories\Eloquent\ProgramRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());
    }
}
