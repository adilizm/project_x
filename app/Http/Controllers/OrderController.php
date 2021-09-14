<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;


class OrderController extends Controller
{
    public function Orders_index(){
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
           $orders=Order::orderBy('created_at','desc')->paginate(10);
           return view('managment.orders.admin.index',compact('orders'));
        }
    }
    public function admin_edit_order($language,$id){
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            $order=Order::find(decrypt($id));
            $orders_detailes=Orderdetail::where('order_id',$order->id)->get();
            return view('managment.orders.admin.edit',compact('order','orders_detailes'));
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
        $request->session()->put('shipping_price', $shipping_price);
        $request->session()->put('lat', $lat);
        $request->session()->put('lng', $lng);
        return $request;
    }
    public function Store_order(Request $request)
    {

        $order = new Order();
        $total_products = 0;
        $total_shipping = $request->session()->get('shipping_price');
        $lat = $request->session()->get('lat');
        $lng = $request->session()->get('lng');
        $cart = $request->session()->get('cart');
        foreach ($cart as $product) {
            $total_products += $product['variant_info']['prix'] * $product['quantity'];
        }
        $new_order = $order->create([
            'user_id' => Auth::user()->id,
            "status" => "new_arrivale",
            "city_id" => $request->city_id,
            "delivery_status" => "not_assigned",
            "price_total" => $total_shipping + $total_products,
            "price_shipping" => $total_shipping,
            "city_id" =>Cookie::get('user_city'),
            "lat" => $lat,
            "lng" => $lng,
        ]);

        foreach ($cart as $product) {
            $orderdetail = new Orderdetail();
            $orderdetail->create([
                'order_id' => $new_order->id,
                'product_id' => $product['product_id'],
                'variant' => json_encode( $product['variant_info']),
                'price' => $product['variant_info']['prix'],
                'qty' => $product['quantity'],
            ]);
        }
        $request->session()->forget('cart');
        $request->session()->forget('shipping_price');
        $request->session()->forget('lat');
        $request->session()->forget('lng');
        return 'thankyou';
    }
}
