<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\CounterRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\MeterDataRepository;
use App\Repositories\ResultRepository;
use App\RepositoryInterfaces\AuthRepositoryInterface;
use App\RepositoryInterfaces\CounterRepositoryInterface;
use App\RepositoryInterfaces\CustomerRepositoryInterface;
use App\RepositoryInterfaces\MeterDataRepositoryInterface;
use App\RepositoryInterfaces\ResultRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ResultRepositoryInterface::class, ResultRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(MeterDataRepositoryInterface::class, MeterDataRepository::class);
        $this->app->bind(CounterRepositoryInterface::class, CounterRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
