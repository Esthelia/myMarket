<?php

namespace App\Http\Controllers\Site\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getShow() {

      $space = Seller::all();
      $product = Product::all();
      
      return view('pages.setting.seller.shop.show', compact('space','product'));  
    }
}
