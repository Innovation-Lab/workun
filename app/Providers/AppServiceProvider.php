<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\OrganizationRepositoryInterface;
use App\Repositories\OrganizationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
