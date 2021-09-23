<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;


class ManagersController extends Controller
{
    public function index(){
        $managers=Manager::OrderBy('created_at','desc')->paginate(10);
        return view('managment.managers.index',compact('managers'));
    }
    public function create(){
        if( !in_array( "managers.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $cities = City::all();
        return view('managment.managers.create',compact('cities'));
    }
    public function store(Request $request){
        if( !in_array( "managers.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
      
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:9|confirmed',
            'city' => 'required',
        ]);

        $user = new User();

        $user = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 2, 
            'password' => Hash::make($request->password),
        ]);

        $manager = new Manager();

        $city = City::find($request->city);

        $manager->create([
            'user_id' => $user->id,
            'city_id' => $city->id,
            'description' => $request->description,
        ]);
        return redirect()->route('managers.index',app()->getLocale())->with('success','a new manager is added go big Or bigger');
    }
    public function change_bann_status(Request $request){
        if( !in_array( "managers.create", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }

        $user=User::find($request->params['id']);
        if($user->is_banned == 1){
            $user->update([
                'is_banned'=>0,
            ]);
            return '0';
        }else{
            $user->update([
                'is_banned'=>1,
            ]);
            return '1';
        }

    }
    public function admin_edit_manager($language,$id){
        Gate::authorize('Admin');
      
        $manager=Manager::find(decrypt($id));
        $cities=City::all();
      
       return view('managment.managers.edit',compact('manager','cities'));
    }
    public function update_manager_info(Request $request){
        Gate::authorize('Admin');
        
        $manager=Manager::find($request->manager_id);
        $user=User::find($manager->user_id);

        $name=$user->name;
        if($request->name != null){
            $name=$request->name;
        }

        $phone=$user->phone;
        if($request->phone != null){
            $phone=$request->phone;
        }

        $email=$user->email;
        if($request->email != null){
            $email=$request->email;
        }

        $city=$manager->city_id;
        if($request->city != null){
            $city=$request->city;
        }
     
        if($request->password != null){
            $user->update([
                'name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
                'password'=>Hash::make($request->password),
            ]);
            $manager->update([
                'city_id'=>$city
            ]);
        }else{
            $user->update([
                'name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
            ]);
            $manager->update([
                'city_id'=>$city
            ]);
        }
        return back()->with('success','the manager is updated ');

    }
}
