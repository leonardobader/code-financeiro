<?php

namespace CodeFin\Providers;

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
        $this->app->bind(\CodeFin\Repositories\MyModelRepository::class, \CodeFin\Repositories\MyModelRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\BankRepository::class, \CodeFin\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\BankAccountRepository::class, \CodeFin\Repositories\BankAccountRepositoryEloquent::class);
        //:end-bindings:
    }
}
