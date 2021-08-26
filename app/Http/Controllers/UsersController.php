<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        if( !in_array( "users.index", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $users= User::all();
        $Roles= Role::all();
       
        return view('managment.users.index', compact('users','Roles'));
    }

    public function change_role(Request $request){
        if( !in_array( "users.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $user= User::FindOrFail($request->user_id);
        $user->update(['role_id'=>$request->role]);
        return back()->with('success','le rôle de l\'utilisateur <strong>'. $user->name .'</strong> a été mis à jour avec succès');
    }
    public function login($id)
    {
        $user = User::findOrFail(decrypt($id));
        auth()->login($user, true);
        return redirect()->route('home');
    }
    public function banned_user(){
        return view('frantend.banned_user');
    }
    public function edit_user($id){
        if( !in_array( "users.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $user= User::find(decrypt($id));
        $roles= Role::all();
        return view('managment.users.edit',compact('user','roles'));
    }
    public function update(Request $request)
    {
        if( !in_array( "users.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $user = User::Find(decrypt($request->user_id));
        $is_banned = 0;
        if($request->is_banned == "1"){
           $is_banned=1;
        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "role_id" => $request->role,
            "is_banned" => $is_banned,
            "phone" => $request->phone,
        ]);
        return redirect()->route('users.index')->with('success','les informations de l\'utilisateur '. $user->name .' ont été mises à jour');
    }
}
