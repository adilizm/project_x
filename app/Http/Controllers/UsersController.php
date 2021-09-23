<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index(){
        Gate::authorize('users.index');
        if(Auth::user()->role_id == 1){
            $users= User::paginate(7);
            $Roles= Role::all();
        }else if(Auth::user()->role_id == 2){
            $users= User::whereHas('Customer', function (Builder $query) {
                $query->where('city_id', Auth::user()->Manager()->first()->city_id);
            })->paginate(10);
            $Roles= Role::all();
        }else{
            return 'to view users you should be admin or manager pls contact the admin to take care of you thanks';
        }
        return view('managment.users.index', compact('users','Roles'));
    }

    public function change_role(Request $request){
        Gate::authorize('users.edit');
        $user= User::FindOrFail($request->user_id);
        $user->update(['role_id'=>$request->role]);
        return back()->with('success','le rôle de l\'utilisateur <strong>'. $user->name .'</strong> a été mis à jour avec succès');
    }
    public function login($language,$id)
    {        
       // check if admin or manager
        $user = User::findOrFail(decrypt($id));
        auth()->login($user, true);
        return redirect()->route('home',app()->getLocale());
    }
    public function banned_user(){
        return view('frontend.banned_user');
    }
    public function edit_user($language,$id){
        Gate::authorize('users.edit');
        $user= User::find(decrypt($id));
        $roles= Role::all();
        return view('managment.users.edit',compact('user','roles'));
    }
    public function update(Request $request)
    {
        Gate::authorize('users.edit');
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
        return redirect()->route('users.index',app()->getLocale())->with('success','les informations de l\'utilisateur '. $user->name .' ont été mises à jour');
    }
    public function My_profile(){
       return view('frontend.user.profile');
    }
}
