<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Contracts\ArticleRepository::class, \App\Repositories\Eloquents\ArticleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\TagRepository::class, \App\Repositories\Eloquents\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Contracts\WorkRepository::class, \App\Repositories\Eloquents\WorkRepositoryEloquent::class);
        //:end-bindings:
    }
}
