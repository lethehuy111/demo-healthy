<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Diet\DietRepository;
use App\Repositories\DietDishDay\DietDishDayRepository;
use App\Repositories\HistoryHealth\HistoryHealthRepository;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\DietDishDayRepositoryInterface;
use App\Repositories\Interfaces\DietRepositoryInterface;
use App\Repositories\Interfaces\HistoryHealthRepositoryInterface;
use App\Repositories\Interfaces\NewRepositoryInterface;
use App\Repositories\Interfaces\UserDietRepositoryRepositoryInterface;
use App\Repositories\New\NewRepository;
use App\Repositories\UserDietRepository\UserDietRepositoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        AuthRepositoryInterface::class => AuthRepository::class,
        DietDishDayRepositoryInterface::class => DietDishDayRepository::class,
        HistoryHealthRepositoryInterface::class => HistoryHealthRepository::class,
        UserDietRepositoryRepositoryInterface::class => UserDietRepositoryRepository::class,
        DietRepositoryInterface::class => DietRepository::class,
        NewRepositoryInterface::class => NewRepository::class
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
