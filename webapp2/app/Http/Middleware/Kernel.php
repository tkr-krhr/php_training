<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);

        $response = $next($request);
    }
    protected $middleware = [
        // フレームワークのミドルウェア
    ];

    protected $middlewareGroups = [
        'web' => [
            // フレームワークのミドルウェアグループ
            'my_custom' => \App\Http\Middleware\MyCustomMiddleware::class,
        ],
        'api' => [
            // フレームワークのAPI用ミドルウェアグループ
        ],
    ];

    protected $routeMiddleware = [
        // 他のミドルウェア
        // 'my_custom' => \App\Http\Middleware\MyCustomMiddleware::class,
    ];
}
