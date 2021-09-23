<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\City;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;


class OrderController extends Controller
{
    public function Orders_index(Request $request)
    {
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            $orders = Order::orderBy('created_at', 'desc');

            if ($request->status != null && $request->status != 'filtrer Des ordres') {
                $orders = $orders->where('status', $request->status);
            }
            if ($request->delivery_status != null && $request->delivery_status != 'delivery_status') {
                $orders = $orders->where('delivery_status', $request->delivery_status);
            }
            if ($request->city_id != null && $request->city_id != 'city_id') {
                $orders = $orders->where('city_id', $request->city_id);
            }
            $orders = $orders->paginate(10);
            $cities = City::all();
            return view('managment.orders.admin.index', compact('orders', 'cities'));
        }
        if (in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            $orders = Order::where('city_id', Auth::user()->Manager()->first()->city_id)->orderBy('created_at', 'desc');
            if ($request->status != null && $request->status != 'filtrer Des ordres') {
                $orders = $orders->where('status', $request->status);
            }
            if ($request->delivery_status != null && $request->delivery_status != 'delivery_status') {
                $orders = $orders->where('delivery_status', $request->delivery_status);
            }
            $orders = $orders->paginate(10);
            return view('managment.orders.manager.index', compact('orders'));
        }
        if (in_array("Livreur", json_decode(Auth::user()->Role->permissions))) {
            $orders = Order::where(['status' => 'confirmed', 'city_id' => Auth::user()->Livreur()->first()->city_id, 'livreur_id' => null])->orderBy('created_at', 'desc');
            if ($request->status != null && $request->status != 'filtrer Des ordres') {
                $orders = $orders->where('status', $request->status);
            }
            if ($request->delivery_status != null && $request->delivery_status != 'delivery_status') {
                $orders = $orders->where('delivery_status', $request->delivery_status);
            }
            $orders = $orders->paginate(10);
            return view('managment.orders.delivery.index', compact('orders'));
        }
        if (in_array("Vondeur", json_decode(Auth::user()->Role->permissions))) {
            $orders = Orderdetail::where('vondeur_id', Auth::user()->Vondeur()->first()->id)->with('Order')->orderBy('created_at', 'desc');
            if ($request->status != null && $request->status != 'filtrer Des ordres') {
                $status=$request->status;
                $orders = $orders->where('Order', function(Builder $qeury) use($status){
                    $qeury->where('status',$status);
                });
            }
            if ($request->delivery_status != null && $request->delivery_status != 'delivery_status') {
                $delivery_status=$request->delivery_status;
                $orders = $orders->where('Order', function(Builder $qeury) use($delivery_status){
                    $qeury->where('delivery_status',$delivery_status);
                });
            }
            $orders = $orders->paginate(10);
            return view('managment.orders.vondeur.index', compact('orders'));
        }
        return 'you should be admin or manager pls contact admin to take care of you, Thanks';
    }
    public function admin_edit_order($language, $id)
    {
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            $order = Order::find(decrypt($id));
            $livreurs = Delivery::where(['city_id' => $order->city_id, 'is_active' => 1, 'is_confirmed' => 1])->get();
            $orders_detailes = Orderdetail::where('order_id', $order->id)->get();
            return view('managment.orders.admin.edit', compact('order', 'orders_detailes', 'livreurs'));
        }
    }
    public function manager_edit_order($language, $id)
    {
        if (in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            $order = Order::find(decrypt($id));
            $livreurs = Delivery::where(['city_id' => $order->city_id, 'is_active' => 1, 'is_confirmed' => 1])->get();
            $orders_detailes = Orderdetail::where('order_id', $order->id)->get();
            return view('managment.orders.manager.edit', compact('order', 'orders_detailes', 'livreurs'));
        }
    }

    public function add_to_cart(Request $request)
    {
        /* $request->session()->forget('cart');
        return 'ok'; */
        $product = [];
        $product['product_id'] = $request->params['product_id'];
        $product['variant_info'] = $request->params['selected_variant'];
        $product['quantity'] = $request->params['quantity'];

        $cart = [];
        if ($request->session()->get('cart') != null) {
            $cart = $request->session()->get('cart');
        }

        array_push($cart, $product);
        $request->session()->put('cart', $cart);
        return $request;
    }

    public function remove_from_carte(Request $request)
    {
        /* $request->session()->forget('cart');
        return 'ok'; */
        $old_cart = [];
        $cart = [];
        if ($request->session()->get('cart') != null) {
            $old_cart = $request->session()->get('cart');
            $i = 0;
            foreach ($old_cart as $product) {
                if ($i != $request->params['position_to_delete']) {
                    array_push($cart, $product);
                }
                $i++;
            }
        }

        $request->session()->put('cart', $cart);
        return $cart;
    }

    public function Create_order(Request $request)
    {
        if (Auth::user() == null) {
            return redirect()->route('Login_required', ['language' => app()->getLocale()]);
        } else {
            /*   dd($request); */
            $cart = [];
            $old_cart = $request->session()->get('cart');
            $i = 0;
            foreach ($request->qty as $product_qyt) {
                $old_cart[$i]['quantity'] = $product_qyt;
                array_push($cart, $old_cart[$i]);
                $i++;
            }
            $request->session()->put('cart', $cart);
        }

        return redirect()->route('select_position', ['language' => app()->getLocale()]);
    }
    public function Select_position(Request $request)
    {
        if (Auth::user() == null) {
            return redirect()->route('Login_required', ['language' => app()->getLocale()]);
        } else {
            $shops_ids = [];
            $shops_latlng = [];
            $cart = $request->session()->get('cart');
            foreach ($cart as $product) {
                //fixe relation between shop and product 
                $shop = Product::find($product['product_id'])->Shop()->first();
                $shop_latlng = [$shop->map_latitude, $shop->map_longitude];
                array_push($shops_ids, $shop->id);
                array_push($shops_latlng, $shop_latlng);
            }
            $shops_ids = array_unique($shops_ids);
            $nbr_shops = count($shops_ids);

            $shipping_fee_first_10_km = Businesssetting::where("name", "Delivery_price_costumer_less_than_10_KM")->first()->value;
            $shipping_fee_more_than_10_km = Businesssetting::where("name", "Delivery_price_costumer_more_than_10KM")->first()->value;
            $min_shipping_fee = Businesssetting::where("name", "min_Delivery_price_costumer")->first()->value;
            return view('frontend.select_position', compact('nbr_shops', 'shipping_fee_first_10_km', 'shipping_fee_more_than_10_km', 'min_shipping_fee', 'shops_latlng'));
        }
    }


    public function Store_shipping_price_and_latlng(Request $request)
    {
        $shipping_price = $request->params['shipping_price'];
        $lat = $request->params['lat'];
        $lng = $request->params['lng'];
        $address = $request->params['address'];
        $delivery_price_shipping = $request->params['delivery_price_shipping'];
        $request->session()->put('shipping_price', $shipping_price);
        $request->session()->put('lat', $lat);
        $request->session()->put('lng', $lng);
        $request->session()->put('address', $address);
        $request->session()->put('delivery_price_shipping', $delivery_price_shipping);
        return $request;
    }
    public function Store_order(Request $request)
    {

        $order = new Order();
        $total_products = 0;
        $total_shipping = $request->session()->get('shipping_price');
        $delivery_price_shipping = $request->session()->get('delivery_price_shipping');
        $lat = $request->session()->get('lat');
        $lng = $request->session()->get('lng');
        $delivery_price_shipping = $request->session()->get('delivery_price_shipping');
        $cart = $request->session()->get('cart');
        foreach ($cart as $product) {
            $total_products += $product['variant_info']['prix'] * $product['quantity'];
        }

        $number = null;
        if ($request->number != null) {
            $number = $request->number;
        }
        $Business = null;
        if ($request->Business != null) {
            $Business = $request->Business;
        }
        $floor = null;
        if ($request->floor != null) {
            $floor = $request->floor;
        }
        $Zone = null;
        if ($request->Zone != null) {
            $Zone = $request->Zone;
        }

        $new_order = $order->create([
            'user_id' => Auth::user()->id,
            "status" => "new_arrivale",
            "delivery_status" => "not_assigned",
            "price_total" => $total_shipping + $total_products,
            "price_shipping" => $total_shipping,
            "city_id" => Cookie::get('user_city'),
            "lat" => $lat,
            "lng" => $lng,
            "number" => $number,
            "Business" => $Business,
            "floor" => $floor,
            "Zone" => $Zone,
            "address_more_info" => $request->session()->get('address'),
            "delivery_price_shipping" => $delivery_price_shipping,

        ]);

        foreach ($cart as $product) {
            $orderdetail = new Orderdetail();
            $orderdetail->create([
                'order_id' => $new_order->id,
                'product_id' => $product['product_id'],
                'vondeur_id' => Product::find($product['product_id'])->Shop()->first()->User()->first()->Vondeur()->first()->id,
                'variant' => json_encode($product['variant_info']),
                'price' => $product['variant_info']['prix'],
                'qty' => $product['quantity'],
            ]);
        }
        $request->session()->forget('cart');
        $request->session()->forget('shipping_price');
        $request->session()->forget('lat');
        $request->session()->forget('lng');
        return ' thank you page';
    }
    public function encreas_qty(Request $request)
    {
        $cart = $request->session()->get('cart');
        $cart[$request->params['_position']]['quantity'] = $request->params['_value'];
        $request->session()->put('cart', $cart);
        return $request;
    }
    public function decreas_qty(Request $request)
    {
        $cart = $request->session()->get('cart');
        $cart[$request->params['_position']]['quantity'] = $request->params['_value'];
        $request->session()->put('cart', $cart);
        return $request;
    }
    public function update_order_status(Request $request)
    {
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions)) || in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            Order::find($request->params['order_id'])->update([
                'status' => $request->params['order_status'],
            ]);
            return '1';
        }
    }
    public function update_order_delivery(Request $request)
    {
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions)) || in_array("Manager", json_decode(Auth::user()->Role->permissions))) {
            $order = Order::find($request->params['order_id']);
            $delivery = null;
            if ($request->params['order_delivery'] == 'null') {
                $delivery = null;
                $order->update([
                    'delivery_status' => 'not_assigned',
                    'Livreur_id' => $delivery,
                ]);
                return '2';
            } else {
                $delivery = $request->params['order_delivery'];
            }
            $order->update([
                'Livreur_id' => $delivery,
                'delivery_status' => 'in_the_way',
            ]);
            return '1';
        }
    }
    public function delivery_show_order($language, $id)
    {
        $order = Order::find(decrypt($id));
        if ($order->city_id == Auth::user()->Livreur()->first()->city_id) {
            $orders_detailes = Orderdetail::where('order_id', $order->id)->get();
            return view('managment.orders.delivery.show', compact('order', 'orders_detailes'));
        }
    }
    public function delivery_change_delivery_status(Request $request)
    {
        $order = Order::find($request->params['order_id']);
        if ($order->Livreur_id == Auth::user()->Livreur()->first()->id) {
            $order->update([
                'delivery_status'=>$request->params['delivery_status'],
                'status'=>$request->params['delivery_status'],
            ]);
            return '1';
        } 
    }
    public function take_order(Request $request)
    {
        $order = Order::find($request->params['order_id']);
        if ($order->Livreur_id != null) {
            if ($order->Livreur_id == Auth::user()->Livreur()->first()->id ) {
                return '2';
            }
            return '0';
        }
        if ($order->city_id == Auth::user()->Livreur()->first()->city_id) {
            $order->update([
                'Livreur_id' => Auth::user()->Livreur()->first()->id,
                'delivery_status' => 'in_the_way'
            ]);
            return '1';
        }
    }
    public function orders_in_progress(){
        $orders= Order::orderBy('created_at', 'desc')->where(['Livreur_id'=>Auth::user()->Livreur()->first()->id,'delivery_status'=>'in_the_way'])->get();
        return view('managment.orders.delivery.orders_on_cours', compact('orders'));

    }
    public function deliver_orders_history(){
        $orders= Order::orderBy('created_at', 'desc')->where(['Livreur_id'=>Auth::user()->Livreur()->first()->id])->whereIn('delivery_status',['successed','returned'])->get();
        return view('managment.orders.delivery.orders_history', compact('orders'));


    }
}
