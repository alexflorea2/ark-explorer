<?php

namespace App\Http\Middleware;

use Ark\Infrastructure\Services\ApiDevNetGateway;
use Ark\Infrastructure\Services\ApiGatewayInterface;
use Ark\Infrastructure\Services\ApiMainNetGateway;
use Closure;
use Illuminate\Http\Request;

class ApiGatewaySelection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentNetwork = session('ARK_NET') ?? env('ARK_NET', 'main');

        if( $currentNetwork == 'main' )
        {
            app()->bind(ApiGatewayInterface::class, ApiMainNetGateway::class);
        }
        else
        {
            app()->bind(ApiGatewayInterface::class, ApiDevNetGateway::class);
        }

        return $next($request);
    }
}
