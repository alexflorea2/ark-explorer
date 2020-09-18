<?php

namespace App\Exceptions;

use Ark\Infrastructure\ApiGatewayException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function render($request, $exception)
    {
        if( !is_null($exception->getPrevious()) && $exception->getPrevious() instanceof ApiGatewayException) {
            //custom error page when custom exception is thrown
            return response()->view('errors.api_gateway', [], 500);
        }

        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
    }
}
