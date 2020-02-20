<?php

namespace App\Providers;
use View;
use App\category;
use Illuminate\Support\ServiceProvider;

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
//        View::share('name1','mamun');
        View::composer('layouts.header',function ($view){
            $view->with('categories',category::where('cat_status',1)->get());
        });
    }
}
