<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\AcademicRepositoryInterface;
use App\Repositories\AcademicRepository;
use App\Repositories\Interfaces\AllocationRepositoryInterface;
use App\Repositories\AllocationRepository;
use App\Repositories\Interfaces\FinancialRepositoryInterface;
use App\Repositories\FinancialRepository;
use App\Repositories\Interfaces\EnrollmentRepositoryInterface;
use App\Repositories\EnrollmentRepository;




class RepositoryServiceProvider extends ServiceProvider


{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AcademicRepositoryInterface::class, AcademicRepository::class);
        $this->app->bind(AllocationRepositoryInterface::class, AllocationRepository::class);
        $this->app->bind(FinancialRepositoryInterface::class, FinancialRepository::class);
        $this->app->bind(EnrollmentRepositoryInterface::class, EnrollmentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
