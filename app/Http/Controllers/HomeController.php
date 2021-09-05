<?php

namespace App\Http\Controllers;

use App\Models\Businesssetting;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        
        $sliders = Slider::all();

        /* Top 10 requested products */
        $top_10_requested_products = [];
        $top_10_requested_products_Businesssetting = Businesssetting::where('name', 'top_10_requested_products')->first();
        if ($top_10_requested_products_Businesssetting->is_active) {
            if (count(json_decode($top_10_requested_products_Businesssetting->value)) > 1) {
                foreach (json_decode($top_10_requested_products_Businesssetting->value) as $product_id) {
                    $product = Product::find($product_id);
                    array_push($top_10_requested_products, $product);
                }
            } else {
                /* change this calcule */
                $top_10_requested_products = Product::orderBy('created_at', 'desc')->take(10)->get();
            }
        }
        /* categories */
        $parent_categoreis=Category::whereNull('parent_id')->get();

        return view('frantend.home', compact('sliders', 'top_10_requested_products','parent_categoreis'));
    }
    
    public function Category($language,$slug,Request $request){
        $category = Category::where('slug',$slug)->with('Child_categoreis')->first();
        $category_and_sub_catigory_ids=[];

        $subcategoreis=[];
        if($category->parent_id != null){
            $sub1=Category::find($category->parent_id);
            array_unshift($subcategoreis,$sub1);

            if($sub1->parent_id != null){
                $sub2=$category::find($sub1->parent_id);
                array_unshift($subcategoreis,$sub2);

                if($sub2->parent_id != null){
                    $sub3=$category::find($sub1->parent_id);
                    array_unshift($subcategoreis,$sub3);

                    if($sub3->parent_id != null){
                        $sub4=$category::find($sub3->parent_id);
                        array_unshift($subcategoreis,$sub4);
                        if($sub4->parent_id != null){
                            $sub5=$category::find($sub4->parent_id);
                            array_unshift($subcategoreis,$sub4);
                        }
                    }
                }
            }
           
        }
        $subcategoreis= array_unique($subcategoreis);
        array_push($category_and_sub_catigory_ids,$category->id);
        foreach($category->Child_categoreis as $child_category){
            array_push($category_and_sub_catigory_ids,$child_category->id);
            foreach($child_category->Child_categoreis as $child_category_level2){
                array_push($category_and_sub_catigory_ids,$child_category_level2->id);
                foreach($child_category_level2->Child_categoreis as $child_category_level3){
                    array_push($category_and_sub_catigory_ids,$child_category_level3->id);
                }
            }
        }
        
        $products=Product::whereIn('category_id', $category_and_sub_catigory_ids)->paginate(10);

      //  dd($category->id,$category_and_sub_catigory_ids,$products);

        /* check view type view grid by default */
        $view_grid=true;
        if($request->view_type == 'list_view'){
            $view_grid=false;
        }
        
        return view('frantend.category.category_index',compact('category','products','subcategoreis','view_grid'));
    }
}
