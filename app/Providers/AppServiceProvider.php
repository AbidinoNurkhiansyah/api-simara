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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());
    }
}
