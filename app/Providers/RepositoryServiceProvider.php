<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\UserService;
use App\Services\Interfaces\WardService;
use App\Services\Interfaces\DistrictService;
use App\Services\Interfaces\ProvinceService;

use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Interfaces\WardRepository;
use App\Repositories\Interfaces\DistrictRepository;
use App\Repositories\Interfaces\ProvinceRepository;
use App\Services\Implementations\UserServiceImplementation;
use App\Services\Implementations\WardServiceImplementation;
use App\Services\Implementations\DistrictServiceImplementation;
use App\Services\Implementations\ProvinceServiceImplementation;
use App\Repositories\Implementations\UserRepositoryImplementation;
use App\Repositories\Implementations\WardRepositoryImplementation;
use App\Repositories\Implementations\DistrictRepositoryImplementation;
use App\Repositories\Implementations\ProvinceRepositoryImplementation;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImplementation::class);
        $this->app->bind(ProvinceRepository::class, ProvinceRepositoryImplementation::class);
        $this->app->bind(DistrictRepository::class, DistrictRepositoryImplementation::class);
        $this->app->bind(WardRepository::class, WardRepositoryImplementation::class);

        $this->app->bind(UserService::class, UserServiceImplementation::class);
        $this->app->bind(ProvinceService::class, ProvinceServiceImplementation::class);
        $this->app->bind(DistrictService::class, DistrictServiceImplementation::class);
        $this->app->bind(WardService::class, WardServiceImplementation::class);
    }

    public function boot(): void {}
}
