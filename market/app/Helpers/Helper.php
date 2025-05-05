<?php

namespace App\Helpers;

use App\Models\Product;
use Carbon\Carbon;

class Helper
{
    /**
     * Retourne le jour actuel
     */
    public static function getCurrentDay(): string
    {
        return Carbon::now()->format('l'); // Retourne le jour complet, ex: "Monday"
    }

    /**
     * Vérifie si aujourd'hui est un jour de marché
     */
    public static function isMarketDay(): bool
    {
        // Exemple : les jours de marché sont mercredi et samedi
        $marketDays = ['Tuesday', 'Sunday'];
        return in_array(self::getCurrentDay(), $marketDays);
    }

    /**
     * Récupère les produits avec les réductions appliquées si c'est le jour du marché
     */
    public static function getProductsWithDiscount($category = 'all', $perPage = 6)
    {
        // Vérifier si aujourd'hui est un jour de marché
        $isMarketDay = self::isMarketDay();

        // Construire la requête de base
        $query = Product::query();

        // Appliquer un filtre par catégorie si nécessaire
        if ($category !== 'all') {
            $query->where('category', $category);
        }

        // Récupérer les produits avec pagination
        $products = $query->paginate($perPage);

        // Taux de réduction
        $discountRate = 0.5; // 50% de réduction si c'est un jour de marché

        // Parcourir les produits et appliquer la réduction
        foreach ($products->items() as $product) {
            if ($isMarketDay) {
                $product->discounted_price = $product->price * (1 - $discountRate);
            } else {
                $product->discounted_price = $product->price;
            }
        }

        // Retourner les produits paginés
        return $products;
    }




}
