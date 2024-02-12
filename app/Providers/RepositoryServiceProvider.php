<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Implementations\UserRepositoryImplementation;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImplementation::class);
    }

    public function boot(): void {}
}
