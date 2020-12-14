<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
use App\Models\Category;
use App\Models\Author;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['author']     = Author::all();
        $data['categories'] = Category::all();
        view()->share($data);
        Builder::defaultStringLength(191); 
    }
}

