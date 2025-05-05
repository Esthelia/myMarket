<?php

namespace App\Http\Controllers\Site\Cart;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Fonction pour récupérer le panier
     */
    private function getCart()
    {
        return session()->get('cart', []);
    }

    /**
     * Fonction pour mettre à jour le panier
     */
    private function updateCart($cart)
    {
        session()->put('cart', $cart);
    }

    /**
     * Fonction pour calculer le total du panier
     */
    private function calculateCartTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }


    // CartController.php

    public function getShow()
    {
        // Récupérer le panier
        $cart = $this->getCart();

        // Initialiser le total global
        $total = 0;

        // Vérifier si c'est un jour de marché
        $isMarketDay = Helper::isMarketDay();

        // Récupérer les produits avec les réductions appliquées
        $productsWithDiscount = collect(Helper::getProductsWithDiscount()->items());

        // Parcourir les articles du panier et calculer les prix
        foreach ($cart as &$item) {
            // Trouver le produit correspondant dans la liste des produits avec réduction
            $product = $productsWithDiscount->firstWhere('id', $item['id']);

            if ($product) {
                // Si c'est un jour de marché, appliquer le prix réduit ; sinon, appliquer le prix normal
                $item['price_to_display'] = $isMarketDay && isset($product->discounted_price) 
                    ? $product->discounted_price 
                    : $product->price;
            } else {
                // Si le produit n'existe pas, prix par défaut
                $item['price_to_display'] = 0;
            }

            // Calculer le total de chaque article
            $itemTotal = $item['quantity'] * $item['price_to_display'];
            $item['total'] = $itemTotal;

            // Ajouter au total global du panier
            $total += $itemTotal;
        }

        // Calculer le nombre total d'articles dans le panier
        $cartCount = array_sum(array_column($cart, 'quantity'));

        // Passer les données à la vue
        return view('pages.cart.show', compact('cart', 'cartCount', 'total', 'isMarketDay'));
    }




    /**
     * Ajouter un produit au panier
     */
    public function postAdd(Request $request, $id)
    {
        // Valider les données
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'wording' => 'required|string',
            'image' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer le panier existant ou créer un nouveau
        $cart = $this->getCart();

        // Ajouter ou mettre à jour l'article dans le panier
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $validatedData['quantity'];
        } else {
            $cart[$id] = $validatedData;
        }

        // Mettre à jour le panier dans la session
        $this->updateCart($cart);

        // Calculer le total des prix
        $totalPanier = $this->calculateCartTotal($cart);

        // Enregistrer les totaux dans la session
        session()->put('totalPanier', $totalPanier);

        // Rediriger avec un message de succès
        return redirect()->route('Site-AboutGetShow')->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Supprimer un produit du panier
     */
    public function getRemove(Request $request, $id)
    {
        $cart = $this->getCart();

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->updateCart($cart);

            // Recalculer le total
            $totalPanier = $this->calculateCartTotal($cart);
            session()->put('totalPanier', $totalPanier);

            return redirect()->route('Site-CartGetShow')->with('success', 'Produit supprimé du panier.');
        }

        return redirect()->route('Site-CartGetShow')->with('error', 'Produit non trouvé dans le panier.');
    }
}