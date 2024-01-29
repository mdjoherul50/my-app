<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
// use these 2 line
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
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
        // Using a view composer to share categories data with the navbar
        View::composer('template.master', function ($view) {
        $view->with('categories', Category::all());
    });
     Paginator::useBootstrap();
    }
}
