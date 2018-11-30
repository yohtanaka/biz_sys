<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.layouts.header', 'App\Http\ViewComposers\AppLayoutComposer');
        View::composer('admin.users.*', 'App\Http\ViewComposers\UserDataComposer');
        View::composer('*.*.index', 'App\Http\ViewComposers\ResetSessionComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
