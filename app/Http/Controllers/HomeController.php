<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
      
        /* Top 10 requested products */
        $top_10_requested_products=[];
        $top_10_requested_products_Businesssetting=Businesssetting::where('name','top_10_requested_products')->first();
        if($top_10_requested_products_Businesssetting->is_active){
            if(count(json_decode($top_10_requested_products_Businesssetting->value)) > 1){
                foreach(json_decode($top_10_requested_products_Businesssetting->value) as $product_id){
                    $product=Product::find($product_id);
                    array_push($top_10_requested_products,$product);
                }
            }else{
                /* change this calcule */
                $top_10_requested_products=Product::orderBy('created_at', 'desc')->take(10)->get();
            }
        }
      
        return view('frantend.home', compact('sliders','top_10_requested_products'));
    }
}
