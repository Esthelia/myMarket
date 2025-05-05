<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CartCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Récupérer le panier de la session
        $cart = session()->get('cart', []);

        // Calculer le nombre total d'articles dans le panier
        $cartCount = array_sum(array_column($cart, 'quantity'));

        // Partager la variable avec toutes les vues
        View::share('cartCount', $cartCount);

        return $next($request);
    }
}
