<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!in_array("products.index", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        if (Auth::user()->role_id == 1) { //1 admin
            $products = Product::with('Images')->paginate(10);
            return view('managment.products.admin.index', compact('products'));
        } else if (Auth::user()->role_id == 2) { // manager
            return view('managment.products.manager.index');
        } else if (Auth::user()->role_id == 3) { // vondeur

            $products = Product::orderBy('created_at', 'asc')->where('shop_id', Auth::user()->Shop->id)->with('Images');
            $date = $request->date;

            $sort_search = null;

            if ($request->has('search') && $request->delete_100_each_page == null) {
                $sort_search = $request->search;
                $products = $products->where('name', 'like', '%' . $sort_search . '%');
            }
            if ($request->status != null && $request->status != 'all' && $request->delete_100_each_page == null && $request->status != 'filtrer Des produit') {
                $products = $products->where('status', $request->status);
            }



            if ($request->status != null && $request->status == 'all' || $request->session()->has('100_each_page')) {
                if ($request->delete_100_each_page != null) {
                    $request->session()->forget('100_each_page');
                    $products = $products->paginate(10);
                } else {
                    $request->session()->put('100_each_page', true);
                    $products = $products->paginate(100);
                }
            } else {
                $products = $products->paginate(10);
            }

            return view('managment.products.vondeur.index', compact('products'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function vondeur_create()
    {
        if (!in_array("products.create", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $categreis = Category::All();
        return view('managment.products.vondeur.create', compact('categreis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function vondeur_store(Request $request)
    {
        if (!in_array("products.create", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'main_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'images.*' => 'mimes:png,jpg,jpeg|max:2048',
            'variants_images.*' => 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|max:1000000',
            'category' => 'required',
        ]);
        $product = new Product();

        $values = [];
        $Counter = 0;
        foreach ($request->values as $value) {

            $values[$Counter] =  explode(",", $value);
            $Counter++;
        }
        $Counter = 0; //

        //dd($request);
        $variants = [];
        if ($request->options[0] != null) {
            foreach ($values[0] as $value0) {
                if ($request->options[1] != null) {
                    foreach ($values[1] as $value1) {
                        if ($request->options[2] != null) {
                            foreach ($values[2] as $value2) {
                                $variant = [];
                                $variant[$request->options[0]] = $value0;
                                $variant[$request->options[1]] = $value1;
                                $variant[$request->options[2]] = $value2;
                                if ($request->allprices == null) {
                                    $variant['prix'] = null;
                                } else {
                                    $variant['prix'] = $request->allprices[$Counter];
                                }
                                if ($request['v_i_' . $Counter] != null) {
                                    $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                                    $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                                    $variant['image'] = $filePath;
                                }
                                if ($request['v_i_' . $Counter] != null) {
                                    $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                                    $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                                    $variant['image'] = $filePath;
                                }
                                array_push($variants, $variant);
                                $Counter++;
                            }
                        } else {
                            $variant = [];
                            $variant[$request->options[0]] = $value0;
                            $variant[$request->options[1]] = $value1;
                            if ($request->qtys == null) {
                                $variant['qty'] = null;
                            } else {
                                $variant['qty'] = $request->qtys[$Counter];
                            }
                            if ($request->allprices == null) {
                                $variant['prix'] = null;
                            } else {
                                $variant['prix'] = $request->allprices[$Counter];
                            }
                            if ($request['v_i_' . $Counter] != null) {
                                $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                                $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                                $variant['image'] = $filePath;
                            }

                            array_push($variants, $variant);
                            $Counter++;
                        }
                    }
                } else if ($request->options[2] != null) {
                    foreach ($values[2] as $value2) {
                        $variant = [];
                        $variant[$request->options[0]] = $value0;
                        $variant[$request->options[2]] = $value2;
                        if ($request->qtys == null) {
                            $variant['qty'] = null;
                        } else {
                            $variant['qty'] = $request->qtys[$Counter];
                        }
                        if ($request->allprices == null) {
                            $variant['prix'] = null;
                        } else {
                            $variant['prix'] = $request->allprices[$Counter];
                        }
                        if ($request['v_i_' . $Counter] != null) {
                            $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                            $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                            $variant['image'] = $filePath;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                    }
                } else {
                    dd($values[0], $request);
                    $variant = [];
                    $variant[$request->options[0]] = $value0;
                    if ($request->qtys[$Counter] == null) {
                        $variant['qty'] = null;
                    } else {
                        $variant['qty'] = $request->qtys[$Counter];
                    }
                    if ($request->allprices[$Counter] == null) {
                        $variant['prix'] = null;
                    } else {
                        $variant['prix'] = $request->allprices[$Counter];
                    }
                    if ($request['v_i_' . $Counter] != null) {
                        $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                        $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                        $variant['image'] = $filePath;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                }
            }
        } else if ($request->options[1] != null) {
            foreach ($values[1] as $value1) {
                if ($request->options[2] != null) {
                    foreach ($values[2] as $value2) {
                        $variant = [];
                        $variant[$request->options[1]] = $value1;
                        $variant[$request->options[2]] = $value2;
                        if ($request->qtys == null) {
                            $variant['qty'] = null;
                        } else {
                            $variant['qty'] = $request->qtys[$Counter];
                        }
                        if ($request->allprices == null) {
                            $variant['prix'] = null;
                        } else {
                            $variant['prix'] = $request->allprices[$Counter];
                        }
                        if ($request['v_i_' . $Counter] != null) {
                            $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                            $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                            $variant['image'] = $filePath;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                    }
                } else {
                    $variant = [];
                    $variant[$request->options[1]] = $value1;
                    if ($request->qtys == null) {
                        $variant['qty'] = null;
                    } else {
                        $variant['qty'] = $request->qtys[$Counter];
                    }
                    if ($request->allprices == null) {
                        $variant['prix'] = null;
                    } else {
                        $variant['prix'] = $request->allprices[$Counter];
                    }
                    if ($request['v_i_' . $Counter] != null) {
                        $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                        $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                        $variant['image'] = $filePath;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                }
            }
        } else if ($request->options[2] != null) {
            foreach ($values[2] as $value2) {
                $variant = [];
                $variant[$request->options[2]] = $value2;
                if ($request->qtys == null) {
                    $variant['qty'] = null;
                } else {
                    $variant['qty'] = $request->qtys[$Counter];
                }
                if ($request->allprices == null) {
                    $variant['prix'] = null;
                } else {
                    $variant['prix'] = $request->allprices[$Counter];
                }
                if ($request['v_i_' . $Counter] != null) {
                    $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                    $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                    $variant['image'] = $filePath;
                }
                array_push($variants, $variant);
                $Counter++;
            }
        }

        $variants_saved = json_encode($variants);

        $min_qty = null;
        if ($request->min_qty != null) {
            $min_qty = $request->min_qty;
        }

        $keywords = null;
        if ($request->keywords != null) {
            $keywords = json_encode(explode(",", $request->keywords));
        }

        $status = 'new';
        if ($request->save_as_draft != null) {
            $status = 'draft';
        }

        $unit = null;
        if ($request->unite != null) {
            $unit = $request->unite;
        }

        $product = $product->create([
            'shop_id' => Auth::user()->Shop->id,
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'prix' => $request->standar_prix,
            'unit' => $unit,
            'status' => $status,
            'confermed' => 0,
            'keywords' => $keywords,
            'min_quantity' => $min_qty,
            'variants' => $variants_saved,
        ]);
        $fileName = time() . '_' . Str::slug($request->name, '_') . '_' . $Counter . '.' . $request['main_image']->guessExtension();
        $filePath = $request->file('main_image')->storeAs('Main_products', $fileName, 'public');
        $product_image = new ProductImage();
        $product_image->create([
            'product_id' => $product->id,
            'path' => $filePath,
            'is_main' => 1
        ]);

        //save detailed_image for product 
        $Counter = 0;
        $images = $request->file('images');
        foreach ($images as $image) {
            if ($Counter < 5) {
                $fileName = time() . '_' . Str::slug($request->name, '_') . '_' . $Counter . '.' . $request->images[$Counter]->guessExtension();
                $path = $image->storeAs('details_products', $fileName, 'public');
                $Counter++;
                $product_image_detaile = new ProductImage();
                $product_image_detaile->create([
                    'product_id' => $product->id,
                    'path' => $path,
                    'is_main' => 0
                ]);
            }
        }

        return redirect()->Route('products.index')->with('success', 'le produit : <strong>' . $product->name . '</strong> a été Ajouter!');
    }
    public function vondeur_edit($id)
    {
        if (!in_array("products.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $product = Product::Find(decrypt($id));
        $categreis = Category::All();
        $keywords = implode(",", json_decode($product->keywords));
        $variants = json_decode($product->variants);
        $options = [];

        foreach ($variants as $option) {
            array_push($options,  $option);
        }
        $options = array_keys(get_object_vars($options[0]));
        // calculate option values like : "red,blue,green"
        $optons_values_temp = [];
        $options_values = [];

        foreach ($options as $option) {
            foreach ($variants as $variant) {
                array_push($optons_values_temp, get_object_vars($variant)[$option]);
            }
            array_push($options_values, implode(",",$optons_values_temp));
            $optons_values_temp=[];
        }
//dd($product, $keywords, $options,$options_values);
        return view('managment.products.vondeur.edit', compact('product', 'categreis', 'keywords','options','options_values'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
