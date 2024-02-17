<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Pagination\Paginator;
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
        view()->composer("admin.includes.topnav",function($view){
            $message=Contact::where("unread",0)->get();
            $view->with("message",$message);
        });
        Paginator::useBootstrap();
    }
}
