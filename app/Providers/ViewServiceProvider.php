<?php

namespace App\Providers;

use App\loai_sp;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layout.index'], function ($view) {
            $loai_sp = loai_sp::with('children')->where('loai_id', 0)->get();
            $view->with(compact('loai_sp'));
        });
    }
}
