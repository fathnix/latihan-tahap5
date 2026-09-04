<?php

namespace App\Providers;

use App\Repositories\CategoryRepoImplements;
use App\Repositories\Interface\CategoryRepository;
use App\Repositories\Interface\ProductRepository;
use App\Repositories\Interface\UserRepository;
use App\Repositories\ProductRepoImplements;
use App\Repositories\UserRepoImplements;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepoImplements::class);
        $this->app->bind(ProductRepository::class, ProductRepoImplements::class);
        $this->app->bind(CategoryRepository::class, CategoryRepoImplements::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
