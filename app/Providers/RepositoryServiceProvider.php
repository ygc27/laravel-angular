<?php

namespace ProjetoAngular\Providers;

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
        $this->app->bind(\LaravelAngular\Repositories\ProjectRepository::class, \LaravelAngular\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\LaravelAngular\Repositories\ProjectNoteRepository::class, \LaravelAngular\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\LaravelAngular\Repositories\ProjectRepository::class, \LaravelAngular\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\LaravelAngular\Repositories\ProjectNoteRepository::class, \LaravelAngular\Repositories\ProjectNoteRepositoryEloquent::class);
        $this->app->bind(\ProjetoAngular\Repositories\ProjectRepository::class, \ProjetoAngular\Repositories\ProjectRepositoryEloquent::class);
        $this->app->bind(\ProjetoAngular\Repositories\ProjectNoteRepository::class, \ProjetoAngular\Repositories\ProjectNoteRepositoryEloquent::class);
        //:end-bindings:
    }
}
