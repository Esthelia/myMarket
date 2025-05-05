<?php

namespace App\Http\Controllers\Site\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function getShow(Request $request)
  {
      $space = Seller::all();
      $product = Product::all();

      $cart = session()->get('cart', []);
      $isMarketDay = session()->get('isMarketDay', false); // Exemple : jour de promotion
      $deliveryOption = session()->get('delivery_option', 'pickup'); // Option de livraison
      $deliveryLocation = session()->get('delivery_location', 'Non spécifié');

      $deliveryCost = $deliveryOption === 'delivery' ? 2000 : 0;

      // Calcul des totaux avec vérification des clés nécessaires
      $total = array_reduce($cart, function ($sum, $item) use ($isMarketDay) {
          $quantity = $item['quantity'] ?? 0;
          $price = $item['price_to_display'] ?? 0;
          return $sum + ($quantity * $price);
      }, 0);

      $finalTotal = $total + $deliveryCost;

      return view('pages.order.confirm', compact(
          'space',
          'product',
          'cart',
          'isMarketDay',
          'deliveryOption',
          'deliveryLocation',
          'deliveryCost',
          'total',
          'finalTotal'
      ));
  }

  public function PostConfirm(Request $request)
    {
        // Validation du numéro de téléphone
        $validatedData = $request->validate([
            'phone' => 'required|regex:/^\d{8,15}$/', // Vérifie que le numéro de téléphone est valide
        ]);

        // Récupérer les informations du panier et du client
        $cart = session()->get('cart', []);
        $deliveryOption = session()->get('delivery_option', 'pickup');
        $deliveryLocation = session()->get('delivery_location', null);
        $deliveryCost = session()->get('delivery_cost', 0);
        $phone = $validatedData['phone'];

        // Sauvegarder les informations de la commande dans la base de données
        // Exemple : Sauvegarde dans une table "orders"
        $order = new Order();
        $order->customer_phone = $phone;
        $order->delivery_option = $deliveryOption;
        $order->delivery_location = $deliveryLocation;
        $order->delivery_cost = $deliveryCost;
        $order->total_price = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price_to_display'] * $item['quantity']);
        }, $deliveryCost);
        $order->save();

        // Sauvegarder chaque élément du panier dans une table "order_items"
        foreach ($cart as $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_name = $item['wording'];
            $orderDetail->category = $item['category'];
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->price = $item['price_to_display'];
            $orderDetail->phone = $item['phone'];
            $orderDetail->save();
        }

        // Vider le panier après la confirmation
        session()->forget('cart');
        session()->forget('delivery_option');
        session()->forget('delivery_location');
        session()->forget('delivery_cost');

        // Rediriger vers la page de confirmation avec un message de succès
        return redirect()->route('Site-OrderGetShow')->with('success', 'Votre commande a été validée avec succès. Vous pouvez télécharger votre facture.');
    }

}
