<?php

namespace App\Http\Controllers\Site\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function getShow() {

      return view('pages.setting.seller.show');  
    }
}
