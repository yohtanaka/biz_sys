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
        View::composer('*.header', 'App\Http\ViewComposers\AppLayoutComposer');
        View::composer('*.*.index', 'App\Http\ViewComposers\ResetSessionComposer');
        View::composer('*.*.create', 'App\Http\ViewComposers\CreateViewComposer');
        View::composer('admin.users.*', 'App\Http\ViewComposers\UserVariableComposer');
        View::composer('admin.news.*', 'App\Http\ViewComposers\NewsVariableComposer');
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
