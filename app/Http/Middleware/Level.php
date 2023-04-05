<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        $levels = [
            'staff' => ['staff', 'admin'],
            'admin' => ['admin']
        ];

        if (!in_array(auth()->user()->level, $levels[$level])) {
            return abort(403);
        }

        return $next($request);
    }
}
