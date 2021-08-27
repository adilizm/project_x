<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitiesController extends Controller
{
    public function index(){
        if( !in_array( "cities.index", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $cities= City::all();
        return view('managment.cities.index',compact('cities'));
    }
    public function store(Request $request){
        if( !in_array( "cities.edit", json_decode(Auth::user()->Role->permissions))){
            abort(403, 'Unauthorized action.');
        }
        $city=City::where('name',$request->name)->first();
        if($city != null){
            return back()->with('warning','La ville '.$city->name.'existe deja');
        }else{
            $city= new City();
            $city->create([
                'name'=>$request->name,
            ]);
        }
        return back()->with('success','La ville '.$city->name.'est Ajouter au villes supporte');

    }
   
}
