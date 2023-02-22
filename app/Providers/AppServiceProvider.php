<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Paginator::useBootstrap();
        
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share(['categories' => $categories]);
        }
        if (Schema::hasTable('tags')) {
            $tags = Tag::all();
            View::share(['tags' => $tags]);
        }
    }
}
