<?php

namespace App\Providers;

use App\Repositories\favorite\FavoriteRepo;
use App\Repositories\favorite\FavoriteRepoImp;
use Illuminate\Support\ServiceProvider;

class FavoriteRepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FavoriteRepo::class, FavoriteRepoImp::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
