<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShow() {

      $product = Product::all();

      return view('pages.setting.seller.product.show', compact('product'));  
    }

    public function postStore(Request $request) {

      $image = $request->file('image');
        $path_image = $image->store('product', "public");
        
        $product = new Product();

        try {
              $product->firstOrCreate([
                  'image' => $path_image,
                  'wording' => $request->wording,
                  'description' => $request->description,
                  'category' => $request->category,
                  'price' => $request->price,
                  'quantity' => $request->quantity,
                  'stock' => $request->stock,
              ]);
         return redirect()->route('Site-ProductGetShow')->with('success', 'Article ajoutée avec succès !');
      } catch (\Exception $e) {
        // Message d'erreur
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'utilisateur.'. $e->getMessage());
    } 
  }
}