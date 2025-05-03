<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Enregistrement du middleware avec un alias
        $middleware->alias([
            'restrict.ip' => \App\Http\Middleware\RestrictIP::class,
        ]);

        // Option 1 : Appliquer globalement à toutes les routes
        $middleware->append(\App\Http\Middleware\RestrictIP::class);

        // Option 2 : Middleware groupes (ex: pour 'web' ou 'api')
        // $middleware->group('web', [
        //     \App\Http\Middleware\RestrictIP::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Personnalisation des erreurs
        $exceptions->render(function (Symfony\Component\HttpKernel\Exception\HttpException $e) {
            if ($e->getStatusCode() === 403) {
                return response()->view('errors.403', [], 403);
            }
        });
    })->create();
