<?php

namespace App\Http\Controllers\Site\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getShow() {

      return view('pages.auth.register.show');  
    }

    public function postStore(Request $request) {
          
          
      $user = new User();
      // dd($user);
      try {

              $image = $request->file('image');
              $path_image = $image->store('register', "public");  

              $user->firstOrCreate([
                  'image' => $request->$path_image,
                  'name' => $request->name,
                  'email' => $request->email,
                  'password' => Hash::make($request->password),
                  'role' => $request->role,
                  'phone' => $request->phone,
                  'gender' => $request->gender,
              ]);

              
            return redirect()->route('Site-RegisterGetShow')->with('success', 'Utilisateur créé avec succès !, Connectez-vous Maintenant');
  
          } catch (\Exception $e) {
              // Message d'erreur
              return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'utilisateur.'. $e->getMessage());
          }  
          
      }
}
