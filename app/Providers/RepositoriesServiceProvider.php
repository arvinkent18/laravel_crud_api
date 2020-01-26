<?php

namespace App\Providers;

use App\Repositories\CourseRepository;
use App\Repositories\CourseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    }
}
