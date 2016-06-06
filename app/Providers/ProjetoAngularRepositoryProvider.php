<?php

namespace ProjetoAngular\Providers;

use Illuminate\Support\ServiceProvider;

class ProjetoAngularRepositoryProvider extends ServiceProvider
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
        
         $this->app->bind(
                \ProjetoAngular\Repositories\ProjectRepository::class,
                \ProjetoAngular\Repositories\ProjectRepositoryEloquent::class
                );
         
          $this->app->bind(
                \ProjetoAngular\Repositories\ProjectNoteRepository::class,
                \ProjetoAngular\Repositories\ProjectNoteRepositoryEloquent::class
                );
           $this->app->bind(
                \ProjetoAngular\Repositories\UserRepository::class,
                \ProjetoAngular\Repositories\UserRepositoryEloquent::class
                );
    }
}
