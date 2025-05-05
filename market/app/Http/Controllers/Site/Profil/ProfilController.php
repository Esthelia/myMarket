<?php

namespace App\Http\Controllers\Site\Profil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function getShow() {

      $user = auth()->user();

      return view('pages.setting.profil.show', compact('user'));  
    }

    public function postDestroy($id )
    {
        $user = User::findOrFail($id);

        if ($user) {
        $user->delete();
        }

        return redirect()->route('Site-ProfilGetShow');
        
    }
}
