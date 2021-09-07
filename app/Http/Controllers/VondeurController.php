<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vondeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VondeurController extends Controller
{
    public function create_vondeur(){
        if (Auth::user() != null) {
            if (Auth::user()->role_id == 5 || Auth::user()->role_id == 2 || Auth::user()->role_id == 4) {  /* 5 is role_id for client */
                return view('frontend.convert_client_to_vondeur');
            }

            if (Auth::user()->role_id == 3) {
                return redirect()->route('home',app()->getLocale());
            }
        }
        
        return view('register_vondeur');
    }


    public function Register_vondeur(Request $request){

        $this->validate($request, [
            'nom' => 'required|min:3|max:15',
            'prenom' => 'required|min:3|max:15',
            'email' => 'required|email',
            'phone' => 'required|max:13',
            'password' => 'required|min:6|confirmed',
            ]);
            
        $user= new User();

        $user = $user->create([
            'name'=>$request->nom .' '. $request->prenom ,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>3,
            'password'=>Hash::make($request->password),
        ]);

        $vonder= new Vondeur();
        
        $vonder->create([
            'user_id'=>$user->id,
        ]);

        auth()->login($user, true);
        return redirect()->route('shops.create',app()->getLocale());
    }

    public function VondeurController(Request $request){
        Auth::user()->update([
            'role_id'=>3
        ]);
      return redirect()->route('shops.create',app()->getLocale());

    }

}
