<?php

namespace ProjetoAngular\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelAngularRepositoryProvider extends ServiceProvider
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
        $this->app->bind(
                \ProjetoAngular\Repositories\ClientRepository::class,
                \ProjetoAngular\Repositories\ClientRepositoryEloquent::class
                );
    }
}