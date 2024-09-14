<?php

namespace App\Providers;

use App\Repositories\Item\ItemRepo;
use App\Repositories\Item\ItemRepoImp;
use Illuminate\Support\ServiceProvider;


class ItemRepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ItemRepo::class, ItemRepoImp::class);

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
