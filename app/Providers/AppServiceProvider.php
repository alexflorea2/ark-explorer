<?php

namespace App\Providers;

use Ark\App\Services\ApiDevNetGateway;
use Ark\App\Services\ApiGatewayInterface;
use Ark\App\Services\ApiMainNetGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if( env('ARK_NET','main') == 'main' )
        {
            $this->app->bind(ApiGatewayInterface::class, ApiMainNetGateway::class);
        }
        else
        {
            $this->app->bind(ApiGatewayInterface::class, ApiDevNetGateway::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
