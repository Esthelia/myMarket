<?php

namespace App\Http\Controllers\Site\Delivery;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // public function postStore(Request $request)
    // {
    //     try {
    //         // Gestion des options de livraison
    //         $isPickup = $request->input('delivery_option') === 'pickup';
        
    //         // Validation des données
    //         $request->validate([
    //             'delivery_option' => 'required|in:pickup,delivery',
    //             'delivery_cost' => 'required|integer|min:0',
    //             'delivery_location' => $isPickup ? 'nullable|string' : 'required|string',
    //         ], [
    //             'delivery_option.required' => 'Veuillez sélectionner une option de livraison.',
    //             'delivery_option.in' => 'L\'option de livraison sélectionnée est invalide.',
    //             'delivery_cost.required' => 'Le coût de livraison est requis.',
    //             'delivery_cost.integer' => 'Le coût de livraison doit être un nombre.',
    //             'delivery_location.required' => 'Le lieu de livraison est requis pour une livraison.',
    //             'delivery_location.string' => 'Le lieu de livraison doit être un texte valide.',
    //         ]);
        
    //         // Stockage des informations de livraison
    //         session()->put('delivery_option', $request->input('delivery_option'));
    //         session()->put('delivery_cost', $request->input('delivery_cost'));
    //         session()->put(
    //             'delivery_location',
    //             $isPickup ? 'Retrait sur place' : $request->input('delivery_location')
    //         );
        
    //         // Calcul des données du panier
    //         $cart = session()->get('cart', []);
    //         $isMarketDay = Helper::isMarketDay();
    //         $productsWithDiscount = collect(Helper::getProductsWithDiscount()->items());
        
    //         $total = 0;
    //         foreach ($cart as &$item) {
    //             // Assurez-vous que chaque élément a les clés nécessaires pour éviter l'erreur
    //             $product = $productsWithDiscount->firstWhere('id', $item['id'] ?? null);
    //             $item['price_to_display'] = $isMarketDay && isset($product->discounted_price)
    //                 ? $product->discounted_price
    //                 : ($product->price ?? 0); // Défaut à 0 si aucun prix trouvé
        
    //             $item['quantity'] = $item['quantity'] ?? 1; // Quantité par défaut si absente
    //             $item['total'] = $item['quantity'] * $item['price_to_display'];
    //             $total += $item['total'];
    //         }
        
    //         // Calcul des totaux
    //         $cartCount = array_sum(array_column($cart, 'quantity'));
    //         $deliveryCost = session('delivery_cost', $isPickup ? 0 : 2000);
    //         $finalTotal = $total + $deliveryCost;
        
    //         // Variables pour la vue
    //         $deliveryOption = session('delivery_option', 'pickup');
    //         $deliveryLocation = session('delivery_location', 'Retrait sur place');
        
    //         // Affichage de la vue
    //         return view('pages.order.show', compact(
    //             'cart',
    //             'cartCount',
    //             'isMarketDay',
    //             'deliveryOption',
    //             'deliveryLocation',
    //             'deliveryCost',
    //             'total',
    //             'finalTotal'
    //         ))->with('success', 'Les détails de livraison ont été enregistrés avec succès.');
    //     } catch (\Exception $e) {
    //         // En cas d'erreur, retour en arrière avec le message d'erreur
    //         return redirect()->back()->withInput()->with('error', 'Erreur: ' . $e->getMessage());
    //     }
        
    // }



    public function postStore(Request $request)
    {
        try {
            // Vérification du panier
            $cart = session()->get('cart', []);
            if (empty($cart) || count($cart) === 0) {
                return redirect()->route('cart.index')->with('error', 'Votre panier est vide ! Veuillez ajouter des articles à votre panier avant de valider la commande.');
            }

            // Gestion des options de livraison
            $isPickup = $request->input('delivery_option') === 'pickup';

            // Validation des données
            $request->validate([
                'delivery_option' => 'required|in:pickup,delivery',
                'delivery_cost' => 'required|integer|min:0',
                'delivery_location' => $isPickup ? 'nullable|string' : 'required|string',
            ], [
                'delivery_option.required' => 'Veuillez sélectionner une option de livraison.',
                'delivery_option.in' => 'L\'option de livraison sélectionnée est invalide.',
                'delivery_cost.required' => 'Le coût de livraison est requis.',
                'delivery_cost.integer' => 'Le coût de livraison doit être un nombre.',
                'delivery_location.required' => 'Le lieu de livraison est requis pour une livraison.',
                'delivery_location.string' => 'Le lieu de livraison doit être un texte valide.',
            ]);

            // Stockage des informations de livraison dans la session
            session()->put('delivery_option', $request->input('delivery_option'));
            session()->put('delivery_cost', $request->input('delivery_cost'));
            session()->put('delivery_location', $isPickup ? 'Retrait sur place' : $request->input('delivery_location'));

            // Récupération des produits avec leurs réductions
            $isMarketDay = Helper::isMarketDay();
            $productsWithDiscount = collect(Helper::getProductsWithDiscount()->items());

            // Calcul du total du panier
            $total = 0;
            foreach ($cart as &$item) {
                $product = $productsWithDiscount->firstWhere('id', $item['id'] ?? null);
                $item['price_to_display'] = $isMarketDay && isset($product->discounted_price)
                    ? $product->discounted_price
                    : ($product->price ?? 0);

                $item['quantity'] = $item['quantity'] ?? 1;
                $item['total'] = $item['quantity'] * $item['price_to_display'];
                $total += $item['total'];
            }

            // Calcul des totaux et du coût de livraison
            $cartCount = array_sum(array_column($cart, 'quantity'));
            $deliveryCost = session('delivery_cost', $isPickup ? 0 : 2000); // Coût de livraison
            $finalTotal = $total + $deliveryCost;

            // Variables pour la vue
            $deliveryOption = session('delivery_option', 'pickup');
            $deliveryLocation = session('delivery_location', 'Retrait sur place');

            // Affichage de la vue
            return view('pages.order.show', compact(
                'cart',
                'cartCount',
                'isMarketDay',
                'deliveryOption',
                'deliveryLocation',
                'deliveryCost',
                'total',
                'finalTotal'
            ))->with('success', 'Les détails de livraison ont été enregistrés avec succès.');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->withInput()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

   
}
