<?php

namespace App\Http\Controllers\Site\Space;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function getShow() {

      $space = Seller::all();

      return view('pages.setting.seller.space.show', compact('space'));  
    }


    public function postStore(Request $request) {

      $space = new Seller();
  
      try {
              $space->firstOrCreate([
                  'name' => $request->name,
                  'pseudo' => $request->pseudo,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'address' => $request->address,
                  'gender' => $request->gender,
                  'country' => $request->country,
                  'city' => $request->city,
                  'shop' => $request->shop,
                  'category' => $request->category,
              ]);
            return redirect()->route('Site-SpaceGetShow')->with('success', 'Nouveau Vendeur créé avec succès !');
  
          } catch (\Exception $e) {
              // Message d'erreur
              return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'utilisateur.'. $e->getMessage());
          };   
    }
}
