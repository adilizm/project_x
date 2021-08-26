<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        if (!in_array("products.index", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) { //1 admin change this to Role has permition admin 
            $shops= Shop::all();
            return view('managment.shops.admin.index',compact('shops'));
        }
    }

    public function create()
    {
        if (Auth::user()->role_id != 3 && Auth::user()->role_id != 1) {
            return redirect()->route('home');
        }
        $cities= City::all();
        return view('shop.shop_create',compact('cities'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required|max:20',
            'Ville' => 'required',
            'address' => 'required|max:240',
            'description' => 'required|max:400',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $fileName = time() . '_' . $request->logo->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('shops', $fileName, 'public');
        $city=City::find($request->Ville);
        $shop = new Shop();
        $shop->create([
            'name' => $request->name,
            'City_id' => $city->id,
            'address' => $request->address,
            'description' => $request->description,
            'map_latitude' => $request->lat,
            'map_longitude' => $request->lng,
            'logo_path' => $filePath,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('shops.register_complet');
    }
    public function register_complet()
    {
        $shop = Auth::user()->Shop;
        return view('shop.register_complet', compact('shop'));
    }
}
