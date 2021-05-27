<?php

namespace Dk\Liker;

use Illuminate\Support\ServiceProvider;

class LikerServiceProvider extends ServiceProvider
{
    /**
     * Application bootstrap event.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_likes_table.php' => database_path('migrations/'.date('Y_m_d_His').'_create_likes_table.php'),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
