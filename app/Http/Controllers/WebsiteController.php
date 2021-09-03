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

}
