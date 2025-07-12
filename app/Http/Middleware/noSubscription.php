<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class noSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user && $user->subscriptions()->active()->exists()) {
            return redirect()->route('dashboard-analytics');
        }

        return $next($request);
    }
}
