<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    public function create_delivery()
    {
        $cities = City::all();
        return view('delivery.register_as_delivery', compact('cities'));
    }
    public function delivery_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|min:9|confirmed',
            'address' => 'required|max:300',
            'description' => 'required|max:400',
            'city' => 'required',
        ]);
        $user = new User();
        $user = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 4,
            'password' => Hash::make($request->password),
        ]);
        $delivery = new Delivery();

        $city = City::find($request->city);

        $delivery->create([
            'user_id' => $user->id,
            'address' => $request->address,
            'city_id' => $city->id,
            'description' => $request->description,
        ]);
        return view('delivery.thanks_delivery_after_register');
    }
    public function Orders_index()
    {
        $cities = City::all();
        $deliveries = Delivery::orderBy('created_at', 'desc')->paginate(10);
        return view('managment.delivery.index', compact('deliveries', 'cities'));
    }
    public function update_delivery_activity(Request $request)
    {

        if (!in_array("delivery.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $delivery = Delivery::find($request->params['id']);
        $is_active = 0;
        if ($delivery->is_active == 1) {
            $is_active = 0;
        } else {
            $is_active = 1;
        }

        $delivery->update([
            'is_active' => $is_active,
        ]);
        return '1';
    }
    public function update_delivery_activation(Request $request)
    {

        if (!in_array("delivery.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $delivery = Delivery::find($request->params['id']);
        $is_confirmed = 0;
        if ($delivery->is_confirmed == 1) {
            $is_confirmed = 0;
        } else {
            $is_confirmed = 1;
        }
        $delivery->update([
            'is_confirmed' => $is_confirmed,
        ]);
        return '1';
    }
    public function edit_delivery($language, $id)
    {
        if (!in_array("delivery.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $delivery = Delivery::find(decrypt($id));
        $cities = City::all();
        return view('managment.delivery.edit', compact('delivery','cities'));
    }
    public function Delivery_update_info(Request $request)
    {
        if (!in_array("delivery.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $delivery = Delivery::find(decrypt($request->delivery_id));
        $delivery_user = User::find($delivery->user_id);
        $is_banned = 0;
        if ($request->is_banned == "1") {
            $is_banned = 1;
        }
        $delivery_user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_banned' => $is_banned,
        ]);
        if ($request->is_confirmed == 'on') {
            $is_confirmed = 1;
        } else {
            $is_confirmed = 0;
        }

        if ($request->is_active == 'on') {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $delivery->update([
            'description' => $request->description,
            'is_confirmed' => $is_confirmed,
            'is_active' => $is_active,
            'city_id' => (int)$request->city_id,
            'address' => $request->address,
        ]);
        return back()->with('success', 'delivery user is updated');
    }
}
