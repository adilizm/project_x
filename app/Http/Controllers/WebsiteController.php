<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use Illuminate\Http\Request;


class WebsiteController extends Controller
{
    public function index(){
        return view('managment.website_managment.index');
    }
    public function edit_home_page(){
        return view('managment.website_managment.pages.edit_home_page_elements');
    }
    public function update_10_top_requested_products(Request $request){
       
        if($request->is_active == "0"){
            $business_setting=Businesssetting::where('name','top_10_requested_products')->first();
            $business_setting->update([
                'is_active'=>0,
            ]);
            return back()->with('success','Les 10 produits les plus demandés ne seront pas affichés sur la page d\'accueil');
        }else{
            $business_setting=Businesssetting::where('name','top_10_requested_products')->first();
            $business_setting->update([
                'is_active'=>1,
            ]);
            return back()->with('success','Les 10 produits les plus demandés seront affichés sur la page d\'accueil');
        }
        if($request->most_requested_products_genirate== "manualy"){
            return back()->with('warning','Cette fonctionnalité est en cours de développement veuillez réessayer plus tard ');
        }else{
            $business_setting=Businesssetting::where('name','top_10_requested_products')->first();
            $business_setting->update([
                'is_active'=>1,
                'value'=>'[]'
            ]);
        }
        return view('managment.website_managment.pages.edit_home_page_elements');
    }
     public function Shipping_configuration()
    {
        $Delivery_price_costumer_less_than_10_KM=Businesssetting::where('name','Delivery_price_costumer_less_than_10_KM')->first();
        $Delivery_price_costumer_more_than_10KM=Businesssetting::where('name','Delivery_price_costumer_more_than_10KM')->first();
        $min_Delivery_price_costumer=Businesssetting::where('name','min_Delivery_price_costumer')->first();
        $Delivery_price_delivery_man_less_than_10_KM=Businesssetting::where('name','Delivery_price_delivery_man_less_than_10_KM')->first();
        $Delivery_price_delivery_man_more_than_10_KM=Businesssetting::where('name','Delivery_price_delivery_man_more_than_10_KM')->first();
        $min_Delivery_price_delivery_man=Businesssetting::where('name','min_Delivery_price_delivery_man')->first();
        return view('managment.website_managment.shipping.index',compact('Delivery_price_costumer_less_than_10_KM','Delivery_price_costumer_more_than_10KM','min_Delivery_price_costumer','Delivery_price_delivery_man_less_than_10_KM','Delivery_price_delivery_man_more_than_10_KM','min_Delivery_price_delivery_man'));
    }
    public function Shipping_configuration_update(Request $request){
        $request->validate([
            'Delivery_price_delivery_man_each_KM'=>'required',
            'Delivery_price_costumer_each_KM'=>'required'
        ]);
        Businesssetting::where('name','Delivery_price_costumer_each_KM')->first()->update([
            'value'=>$request->Delivery_price_costumer_each_KM
        ]);
        Businesssetting::where('name','Delivery_price_delivery_man_each_KM')->first()->update([
            'value'=>$request->Delivery_price_delivery_man_each_KM
        ]);
        return back()->with('success','les valeus de shipping updated');
    }

}
