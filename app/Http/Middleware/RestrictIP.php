<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class RestrictIP
{
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIPs = explode(',', env('ALLOWED_IPS', ''));
        $clientIP = $request->ip();

        if (!in_array($clientIP, $allowedIPs)) {
            abort(403, "Accès refusé. Votre IP : $clientIP");
        }

        return $next($request);
    }
}
