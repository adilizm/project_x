<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        if (!in_array("shops.index", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) { //1 admin change this to Role has permition admin 

            $shops = Shop::orderBy('created_at', 'asc');
            if ($request->city_id != null && $request->city_id != "filtrer par ville") {
                $shops = $shops->where('city_id', $request->city_id);
            }
            if ($request->confirmation != null && $request->confirmation != "filtrer par situation") {
                if ($request->confirmation == "1") {
                    $shops = $shops->where('is_published', 1);
                } else {
                    $shops = $shops->where('is_published', 0);
                }
            }

            if ($request->search != null && $request->search != "filtrer par situation") {
                $shops = $shops->where('name', 'like', '%' . $request->search . '%');
            }

            $shops = $shops->paginate(10);
            $cities = City::all();
            return view('managment.shops.admin.index', compact('shops', 'cities'));
        }
        if (in_array("Manager", json_decode(Auth::user()->Role->permissions))) { //1 admin change this to Role has permition admin 

            $shops = Shop::orderBy('created_at', 'asc')->where('city_id', Auth::user()->Manager()->first()->city_id);

            if ($request->confirmation != null && $request->confirmation != "filtrer par situation") {
                if ($request->confirmation == "1") {
                    $shops = $shops->where('is_published', 1);
                } else {
                    $shops = $shops->where('is_published', 0);
                }
            }

            if ($request->search != null && $request->search != "filtrer par situation") {
                $shops = $shops->where('name', 'like', '%' . $request->search . '%');
            }

            $shops = $shops->paginate(10);
            $cities = City::all();
            return view('managment.shops.manager.index', compact('shops', 'cities'));
        }
    }

    public function create()
    {
        if (Auth::user()->role_id != 3 && Auth::user()->role_id != 1) {
            return redirect()->route('home', app()->getLocale());
        }
        $cities = City::all();
        return view('shop.shop_create', compact('cities'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'logo'        => 'required|mimes:png,jpg,jpeg|max:2048',
            'banner'      => 'required|mimes:png,jpg,jpeg|max:2048',
            'name'        => 'required|max:20',
            'city_id'     => 'required',
            'address'     => 'required|max:240',
            'description' => 'required|max:400',
            'lat'         => 'required',
            'lng'         => 'required',
        ]);

        $fileName = time() . '_' . $request->logo->getClientOriginalName();
        $logo_filePath = $request->file('logo')->storeAs('shops', $fileName, 'public');
        $fileName = time() . '_' . $request->banner->getClientOriginalName();
        $banner_filePath = $request->file('banner')->storeAs('shops', $fileName, 'public');

        $city = City::find($request->city_id);

        $shop = new Shop();
        $shop->create([
            'name' => $request->name,
            'city_id' => $city->id,
            'address' => $request->address,
            'description' => $request->description,
            'map_latitude' => $request->lat,
            'map_longitude' => $request->lng,
            'logo_path' => $logo_filePath,
            'banner_path' => $banner_filePath,
            'user_id' => Auth::user()->id,
            'request_activation' => 1,
        ]);
        return redirect()->route('shops.register_complet', app()->getLocale());
    }
    public function register_complet()
    {
        $shop = Auth::user()->Shop;
        return view('shop.register_complet', compact('shop'));
    }
    public function admin_edit_shop($language, $id)
    {
        if (!in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $shop = Shop::find(decrypt($id));
        $cities = City::all();
        return view('managment.shops.admin.edit', compact('shop', 'cities'));
    }
    public function manager_edit_shop($language, $id)
    {
        if (!in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $shop = Shop::find(decrypt($id));
        $cities = City::all();
        return view('managment.shops.manager.edit', compact('shop', 'cities'));
    }
    public function manager_update_shop(Request $request)
    {
        if (!in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'shop_id' => 'required|max:20',
        ]);
        $shop = Shop::find($request->shop_id);

        $name = $shop->name;
        if ($request->has('name')) {
            $name = $request->name;
        }

        $is_published = $shop->is_published;
        if ($request->has('activation')) {
            $is_published = $request->activation;
        }

        $address = $shop->address;
        if ($request->has('address')) {
            $address = $request->address;
        }

        $city_id = $shop->city_id;
        if ($request->has('city_id')) {
            $city_id = $request->city_id;
        }
        $shop->update([
            'city_id' => $city_id,
            'address' => $address,
            'is_published' => $is_published,
            'name' => $name,
        ]);
        return redirect()->route('shops.index', app()->getLocale())->with('success', 'le magasin a ete mise a jour');
    }
    public function admin_update_shop(Request $request)
    {
        if (!in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'shop_id' => 'required|max:20',
        ]);
        $shop = Shop::find($request->shop_id);

        $name = $shop->name;
        if ($request->has('name')) {
            $name = $request->name;
        }

        $is_published = $shop->is_published;
        if ($request->has('activation')) {
            $is_published = $request->activation;
        }

        $address = $shop->address;
        if ($request->has('address')) {
            $address = $request->address;
        }

        $city_id = $shop->city_id;
        if ($request->has('city_id')) {
            $city_id = $request->city_id;
        }
        $shop->update([
            'city_id' => $city_id,
            'address' => $address,
            'is_published' => $is_published,
            'name' => $name,
        ]);
        return redirect()->route('shops.index', app()->getLocale())->with('success', 'le magasin a ete mise a jour');
    }
    public function shop_products(Request $request)
    {
       
        if (!in_array("shops.index", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $shop_id=$request->shop_id;
        $products = Product::orderBy('created_at', 'asc')->with('Images')->where('shop_id', decrypt( $request->shop_id));
        if ($request->search != null) {
            $sort_search = $request->search;
            $products = $products->where('name', 'like', '%' . $sort_search . '%');
        }
        if ($request->status != null && $request->status != 'all'  && $request->status != 'filtrer Des produit') {
            $products = $products->where('status', $request->status);
        }
        if ($request->confirmation != null && $request->confirmation != 'filtrer Des produit') {
            if ($request->confirmation == 1) {
                $products = $products->where('confermed', 1);
            } else {
                $products = $products->where('confermed', 0);
            }
        }
        $products = $products->paginate(10);

        return view('managment.shops.shop_products', compact('products','shop_id'));
    }
}
