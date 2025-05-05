<?php

namespace App\Http\Controllers\Site\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getShow() {

      return view('pages.setting.show');  
    }
}
