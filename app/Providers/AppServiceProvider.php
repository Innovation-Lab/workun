<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\OrganizationRepositoryInterface;
use App\Repositories\OrganizationRepository;
use App\Repositories\SelfCheckSheetRepositoryInterface;
use App\Repositories\SelfCheckSheetRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(SelfCheckSheetRepositoryInterface::class, SelfCheckSheetRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
