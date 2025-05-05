<?php

namespace App\Http\Controllers\Site\About;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function getShow()
    // {
    //     // Appliquer la pagination et récupérer les produits avec discount
    //     $product = Helper::getProductsWithDiscount(); // Les produits avec réduction et pagination

    //     // Vérifier si aujourd'hui est un jour de marché
    //     $isMarketDay = Helper::isMarketDay();

    //     // Retourner la vue avec les données nécessaires
    //     return view('pages.about.show', compact('product', 'isMarketDay'));
    // }




    public function getShow(Request $request)
    {
        // Récupérer la catégorie sélectionnée depuis la requête (par défaut 'all')
        $category = $request->get('category', 'all');

        // Obtenir les produits paginés avec réductions et filtre
        $product = Helper::getProductsWithDiscount($category);

        // Vérifier si aujourd'hui est un jour de marché (pour l'affichage)
        $isMarketDay = Helper::isMarketDay();

        // Retourner la vue avec les données nécessaires
        return view('pages.about.show', compact('product', 'isMarketDay', 'category'));
    }








    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
