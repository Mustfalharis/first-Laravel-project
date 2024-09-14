<?php

namespace App\Providers;

use App\Repositories\PricesRespositories\PricesImp;
use App\Repositories\PricesRespositories\PricesRep;
use Illuminate\Support\ServiceProvider;

class PricesRepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PricesRep::class, PricesImp::class);
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
