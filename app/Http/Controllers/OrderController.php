<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function add_to_cart(Request $request){
        /* $request->session()->forget('cart');
        return 'ok'; */
        $product=[];
        $product['product_id']=$request->params['product_id'];
        $product['variant_info']=$request->params['selected_variant'];
        $product['quantity']=$request->params['quantity'];
  
          $cart=[];
          if($request->session()->get('cart') != null){
              $cart=$request->session()->get('cart');
          }
         
          array_push($cart,$product);
          $request->session()->put('cart', $cart);
          return $request;
      }
      
      public function remove_from_carte(Request $request){
        /* $request->session()->forget('cart');
        return 'ok'; */
          $old_cart=[];
          $cart=[];
          if($request->session()->get('cart') != null){
              $old_cart=$request->session()->get('cart');
              $i=0;
              foreach($old_cart as $product){
                  if($i!= $request->params['position_to_delete']){
                      array_push($cart,$product);
                  }
                  $i++;
              }
          }
          $request->session()->put('cart', $cart);
          return $cart;
      }

    public function Create_order(Request $request){
        if(Auth::user() == null){
            return redirect()->route('Login_required',['language'=>app()->getLocale()]);
        }else{
          /*   dd($request); */
          $cart=[];
          $old_cart=$request->session()->get('cart');
          $i=0;
          foreach($request->qty as $product_qyt){
             $old_cart[$i]['quantity']=$product_qyt;
               array_push($cart,$old_cart[$i]);
               $i++;
          }
          $request->session()->put('cart',$cart);
        }

        return redirect()->route('select_position',['language'=>app()->getLocale()]);

    }
    public function Select_position(Request $request){
        if(Auth::user() == null){
            return redirect()->route('Login_required',['language'=>app()->getLocale()]);
        }else{
            $shops_ids=[];
            $cart=$request->session()->get('cart');
            foreach($cart as $product){
                //fixe relation between shop and product 
                $shop_id=Product::find($product['product_id'])->Shop()->first()->id;
                array_push($shops_ids,$shop_id);
            }
            $shops_ids=array_unique($shops_ids);
            $nbr_shops = count($shops_ids);
            return view('frontend.select_position',compact('nbr_shops'));
        }
    }

    public function Calculate_shipping(Request $request){
        dd($request);
    }
    public function Store_order(Request $request){
        $order= new Order();
        dd($request);

       $oprder= $order->create([
            'user_id'=>Auth::user()->id,
            "status"=>"new_arrivale",
            "delivery_status"=>"not_assigned",
            "price_total"=>"",
            "price_shipping"=>"",
            "lat"=>"",
            "lng"=>"",
        ]);
    }
}
