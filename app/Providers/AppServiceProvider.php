<?php

namespace App\Providers;

use Ark\Infrastructure\Services\ApiDevNetGateway;
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Ark\Infrastructure\Services\ApiMainNetGateway;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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
}
