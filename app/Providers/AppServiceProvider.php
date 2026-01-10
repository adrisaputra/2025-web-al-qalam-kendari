<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Share variable layout ke semua view
        // View::composer('*', function ($view) {
        //     if (Auth::check()) {
        //         $layout = Auth::user()->work_unit_id == 1
        //             ? 'admin.layout1'
        //             : 'admin.layout2';
        //     } else {
        //         // default (misal untuk guest)
        //         $layout = 'admin.layout1';
        //     }

        //     $view->with('layout', $layout);
        // });

        View::composer('*', function ($view) {
            $layout = 'admin.layout';

            $view->with('layout', $layout);
        });
    }
    
}
