<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(){
        
    }

    public function create(){
        if(Auth::user()->role_id != 3 && Auth::user()->role_id != 1  ){
            return redirect()->route('home');
        }
        return view('shop.shop_create');
    }
    public function save(Request $request){
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|max:20',
            'Ville' => 'required|max:20',
            'address' => 'required|max:240',
            'description' => 'required|max:400',
            'lat' => 'required',
            'lng' => 'required',
            ]); 
            
        $fileName = time().'_'.$request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('shops', $fileName, 'public');
        
        $shop= new Shop();
        $shop->create([
          'name'=>$request->name, 
          'Ville'=>$request->Ville, 
          'address'=>$request->address, 
          'description'=>$request->description, 
          'map_latitude'=>$request->lat, 
          'map_longitude'=>$request->lng, 
          'logo_path'=>$filePath, 
          'user_id'=>Auth::user()->id, 
      ]);
     
    }
    public function register_complet(){
        $shop = Auth::user()->Shop;
        return view('shops.register_complet',compact('shop'));
    }
}
