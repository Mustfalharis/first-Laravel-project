<?php

namespace App\Providers;

use App\Repositories\Image\ImageRepo;
use App\Repositories\Image\ImageRepoImp;
use Illuminate\Support\ServiceProvider;

class ImagesRepServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageRepo::class, ImageRepoImp::class);
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
