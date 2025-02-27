<?php

namespace App\Providers;

use App\Domain\Category\Contracts\CategoryServiceContract;
use App\Domain\Category\Services\CategoryService;
use App\Domain\Product\Contracts\ProductServiceContract;
use App\Domain\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceContract::class, ProductService::class);
        $this->app->bind(CategoryServiceContract::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
