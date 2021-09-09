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
    public function index(Request $request)
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
        $parent_categoreis = Category::whereNull('parent_id')->get();

        return view('frontend.home', compact('sliders', 'top_10_requested_products', 'parent_categoreis'));
    }

    public function Category($language, $slug, Request $request)
    {
        $category = Category::where('slug', $slug)->with('Child_categoreis')->first();
        $category_and_sub_catigory_ids = [];

        $subcategoreis = [];
        if ($category->parent_id != null) {
            $sub1 = Category::find($category->parent_id);
            array_unshift($subcategoreis, $sub1);

            if ($sub1->parent_id != null) {
                $sub2 = $category::find($sub1->parent_id);
                array_unshift($subcategoreis, $sub2);

                if ($sub2->parent_id != null) {
                    $sub3 = $category::find($sub1->parent_id);
                    array_unshift($subcategoreis, $sub3);

                    if ($sub3->parent_id != null) {
                        $sub4 = $category::find($sub3->parent_id);
                        array_unshift($subcategoreis, $sub4);
                        if ($sub4->parent_id != null) {
                            $sub5 = $category::find($sub4->parent_id);
                            array_unshift($subcategoreis, $sub4);
                        }
                    }
                }
            }
        }
        $subcategoreis = array_unique($subcategoreis);
        array_push($category_and_sub_catigory_ids, $category->id);
        foreach ($category->Child_categoreis as $child_category) {
            array_push($category_and_sub_catigory_ids, $child_category->id);
            foreach ($child_category->Child_categoreis as $child_category_level2) {
                array_push($category_and_sub_catigory_ids, $child_category_level2->id);
                foreach ($child_category_level2->Child_categoreis as $child_category_level3) {
                    array_push($category_and_sub_catigory_ids, $child_category_level3->id);
                }
            }
        }

        $products = Product::whereIn('category_id', $category_and_sub_catigory_ids)->where(['confermed' => 1, 'status' => 'published'])->paginate(10);

        //  dd($category->id,$category_and_sub_catigory_ids,$products);

        /* check view type view grid by default */
        $view_grid = true;
        if ($request->view_type == 'list_view') {
            $view_grid = false;
        }

        return view('frontend.category.category_index', compact('category', 'products', 'subcategoreis', 'view_grid'));
    }
    public function search(Request $request)
    {
        $prod_result = Product::where('name', 'LIKE', '%' . $request->params['keyword'] . '%')->where('status', 'published')->get();

        if (count($prod_result) > 0) {
            return view('frontend.components.search', compact('prod_result'));
        } else {
            return '0';
        }
    }
    public function Product($language, $slug)
    {
        $product = Product::where('slug', $slug)->where('confermed', '1')->where('status', 'published')->first();
        $nbr_options = count(json_decode($product->variants));
        $options = [];
        for ($i = 0; $i < $nbr_options; $i++) {
            $options = array_keys(get_object_vars(json_decode($product->variants)[$i]));
        }

        $variants = [];
        foreach (json_decode($product->variants) as $variant) {
            array_push($variants, get_object_vars($variant));
        }
        $variables = [];

        foreach ($options as $option) {
            $variable = [];
            foreach ($variants as $variant) {
                array_push($variable, $variant[$option]);
                if ($option != 'qty' && $option != 'prix' && $option != 'image') {
                    $variable = array_unique($variable);
                }
            }
            array_push($variables, $variable);
        }

        /*         dd($variants,$options,$variables);
 */
        if ($product != null) {
            return view('frontend.product.product_index', compact('product', 'variants', 'options', 'variables'));
        } else {
            return redirect()->route('home', ['language' => App::getLocale()]);
        }
    }
    public function panier(Request $request)
    {
        $products_in_cart = [];
        if ($request->session()->get('cart') != null) {
            foreach (session()->get('cart') as $product_selected) {
                $product = \App\Models\Product::find($product_selected['product_id']);
                if ($product->variants != '[]') {
                    $options = [];
                    $selected_variant = [];
                    $options = array_keys(get_object_vars(json_decode($product->variants)[0]));
                    /* dd($options); */
                    //dd($product_selected); 

                    foreach ($options as $option) {
                        if ($option != 'qty' && $option != 'image' && $option != 'prix') {
                            $selected_variant[$option] = $product_selected['variant_info'][$option];
                        }
                        /* get the min qty */
                    }
                    $available_qty = $product_selected['variant_info']['qty'];
                } else {

                }
                $quantity = $product_selected['quantity'];
                if ($quantity > $available_qty) {
                    $quantity = $available_qty;
                }
                $prod = [];
                $prod['selected_variants'] = $selected_variant;
                $prod['options'] = $options;
                $prod['available_qty'] = $available_qty;
                $prod['quantity'] = $quantity;
                $prod['product'] = $product;
                array_push($products_in_cart, $prod);
            }
        }
        return view('frontend.cart.cart',compact('products_in_cart'));
    }
}
