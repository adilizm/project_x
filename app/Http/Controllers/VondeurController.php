<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VondeurController extends Controller
{
    public function create_vondeur(Request $request){

        $this->validate($request, [
            'nom' => 'required|min:3|max:15',
            'prenom' => 'required|min:3|max:15',
            'email' => 'required|email',
            'phone' => 'required|max:13',
            'password' => 'required|min:6|confirmed',
            ]);
            
        $user= new User();

        $user->create([
            'name'=>$request->nom .' '. $request->prenom ,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>3,
            'password'=>Hash::make($request->password),
        ]);

        auth()->login($user, true);
        return redirect()->route('home');
    }
}
