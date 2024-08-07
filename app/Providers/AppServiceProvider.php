<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Repositories\DepartmentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use App\Repositories\EmploymentRepositoryInterface;
use App\Repositories\EmploymentRepository;
use App\Repositories\GradeRepositoryInterface;
use App\Repositories\GradeRepository;
use App\Repositories\OrganizationRepositoryInterface;
use App\Repositories\OrganizationRepository;
use App\Repositories\PeriodRepositoryInterface;
use App\Repositories\PeriodRepository;
use App\Repositories\PositionRepositoryInterface;
use App\Repositories\PositionRepository;
use App\Repositories\SalaryRepositoryInterface;
use App\Repositories\SalaryRepository;
use App\Repositories\SelfCheckSheetRepositoryInterface;
use App\Repositories\SelfCheckSheetRepository;
use App\Repositories\UserDepartmentRepositoryInterface;
use App\Repositories\UserDepartmentRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmploymentRepositoryInterface::class, EmploymentRepository::class);
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(PeriodRepositoryInterface::class, PeriodRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
        $this->app->bind(SalaryRepositoryInterface::class, SalaryRepository::class);
        $this->app->bind(SelfCheckSheetRepositoryInterface::class, SelfCheckSheetRepository::class);
        $this->app->bind(UserDepartmentRepositoryInterface::class, UserDepartmentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        $url->forceScheme('https');
    }
}
