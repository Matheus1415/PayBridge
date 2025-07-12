<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class hasSubscription
{

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Verifica se o usuário tem qualquer assinatura ativa
        if (!$user || !$user->subscriptions()->active()->exists()) {
            return redirect()->route('dashboard-plans');
        }

        return $next($request);
    }
}
