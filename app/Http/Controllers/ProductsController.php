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
use Symfony\Component\VarDumper\VarDumper;

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
        if (in_array("Admin", json_decode(Auth::user()->Role->permissions))) { //1 admin change this to Role has permition admin 
            $products = Product::orderBy('created_at', 'asc')->with('Images');

            $date = $request->date;
            $sort_search = null;
            if ($request->search != null) {
                $sort_search = $request->search;
                $products = $products->where('name', 'like', '%' . $sort_search . '%');
            }
            if ($request->status != null && $request->status != 'all'  && $request->status != 'filtrer Des produit') {
                $products = $products->where('status', $request->status);
            }
            if ($request->confirmation != null && $request->confermed != 'filtrer Des produit') {
                if ($request->confirmation == 1) {
                    $products = $products->where('confermed', 1);
                } else {
                    $products = $products->where('confermed', 0);
                }
            }
            $products = $products->paginate(10);

            return view('managment.products.admin.index', compact('products'));
        } else if (in_array("Manager", json_decode(Auth::user()->Role->permissions))) { // manager
            return view('managment.products.manager.index');
        } else if (in_array("Vondeur", json_decode(Auth::user()->Role->permissions))) { // vondeur
            if (Auth::user()->Shop()->first() == null) {
                return redirect()->route('shops.create',app()->getLocale())->with('info', 'pour ajouter des produits dont vous avez d\'abord besoin pour avoir une boutique, veuillez remplir les informations ci-dessous pour créer votre boutique');
            }
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
            abort(404);
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
            'name' => 'required',
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
                                } else {
                                    $variant['image'] = null;
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
                            } else {
                                $variant['image'] = null;
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
                        } else {
                            $variant['image'] = null;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                    }
                } else {

                    $variant = [];
                    $variant[$request->options[0]] = $value0;
                    if ($request->has('qtys')) {
                        $variant['qty'] = $request->qtys[$Counter];
                    } else {
                        $variant['qty'] = null;
                    }
                    if ($request->has('allprices')) {
                        if ($request->allprices[$Counter] != null) {
                            $variant['prix'] = $request->allprices[$Counter];
                        } else {
                            $variant['prix'] = null;
                        }
                    } else {
                        $variant['prix'] = null;
                    }
                    if ($request['v_i_' . $Counter] != null) {
                        $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                        $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                        $variant['image'] = $filePath;
                    } else {
                        $variant['image'] = null;
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
                        } else {
                            $variant['image'] = null;
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
                    } else {
                        $variant['image'] = null;
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
                } else {
                    $variant['image'] = null;
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
        $old_price = 0;
        if ($request->old_price != null) {
            $old_price = $request->old_price;
        }

        $product = $product->create([
            'shop_id' => Auth::user()->Shop->id,
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'prix' => $request->standar_prix,
            'old_price' => $old_price,
            'unite' => $unit,
            'status' => $status,
            'confermed' => 0,
            'keywords' => $keywords,
            'min_quantity' => 1,
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

        return redirect()->Route('products.index',app()->getLocale())->with('success', 'le produit : <strong>' . $product->name . '</strong> a été Ajouter!');
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
        if (count($options) > 0) {
            $options = array_keys(get_object_vars($options[0]));
        }
        // calculate option values like : "red,blue,green"
        $optons_values_temp = [];
        $options_values = [];


        foreach ($options as $option) {
            foreach ($variants as $variant) {
                if (!in_array(get_object_vars($variant)[$option], $optons_values_temp)) {
                    array_push($optons_values_temp, get_object_vars($variant)[$option]);
                }
            }
            array_push($options_values, implode(",", $optons_values_temp));
            $optons_values_temp = [];
        }
        $qtys = [];
        $prixs = [];
        if (count($options) > 0) {
            $qtys = $options_values[count($options_values) - 2]; // this is qty 
            $prixs = $options_values[count($options_values) - 1]; // this is prix
            unset($options_values[count($options_values) - 2]);
            unset($options_values[count($options_values) - 1]);
        }
        //convert variants element from objects to arrays 
        $variants_as_array = [];
        foreach ($variants as $variant) {
            array_push($variants_as_array, (array)$variant);
        }
        // dd($product, $keywords, $options,$options_values,$qtys,$prixs,(array)$variants[0],$variants_as_array);
        return view('managment.products.vondeur.edit', compact('product', 'categreis', 'keywords', 'options', 'options_values', 'prixs', 'qtys', 'variants_as_array'));
    }
    public function vondeur_update(Request $request)
    {
        $product = Product::Find(decrypt($request->product_id));

        if (!in_array("products.create", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'description' => 'required|max:1000000',
            'category' => 'required',
            'name' => 'required'
        ]);
        if ($request->main_image != null) {
            $request->validate([
                'main_image' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        if ($request->images != null) {
            $request->validate([
                'images.*' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        if ($request->variants_images != null) {
            $request->validate([
                'variants_images.*' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        $values = [];
        $Counter = 0;
        foreach ($request->values as $value) {
            $values[$Counter] =  explode(",", $value);
            $Counter++;
        }
        unset($values[count($values) - 1]);

        $Counter = 0;
        $Counter_img = 0;
        // dd($request);
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
                                    var_dump($Counter, $value0, $value1, $value2, $request->allprices[$Counter]);
                                    $variant['prix'] = $request->allprices[$Counter];
                                }
                                if ($request->qtys == null) {
                                    $variant['qty'] = null;
                                } else {
                                    $variant['qty'] = $request->qtys[$Counter];
                                }
                                if ($request['v_i_' . $Counter] != null) {
                                    $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                                    $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                                    $variant['image'] = $filePath;
                                } else if ($request['v_old_i_' . $Counter_img] != null) {
                                    $variant['image'] = $request['v_old_i_' . $Counter_img];
                                } else {
                                    $value['image'] = null;
                                }
                                array_push($variants, $variant);
                                $Counter++;
                                $Counter_img++;
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
                            if ($request['v_i_' . $Counter_img] != null) {
                                $fileName = time() . '_' . $request->name . '_' . $Counter_img . '.' . $request['v_i_' . $Counter_img]->guessExtension();
                                $filePath = $request->file('v_i_' . $Counter_img)->storeAs('variants_pic', $fileName, 'public');
                                $variant['image'] = $filePath;
                            } else if ($request['v_old_i_' . $Counter_img] != null) {
                                $variant['image'] = $request['v_old_i_' . $Counter_img];
                            } else {
                                $variant['image'] = null;
                            }
                            if ($Counter_img == 2) {
                            }
                            array_push($variants, $variant);
                            $Counter++;
                            $Counter_img++;
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
                        } else if ($request['v_old_i_' . $Counter_img] != null) {
                            $variant['image'] = $request['v_old_i_' . $Counter_img];
                        } else {
                            $variant['image'] = null;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                        $Counter_img++;
                    }
                } else {
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
                    } else if ($request['v_old_i_' . $Counter_img] != null) {
                        $variant['image'] = $request['v_old_i_' . $Counter_img];
                    } else {
                        $variant['image'] = null;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                    $Counter_img++;
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
                        } else if ($request['v_old_i_' . $Counter_img] != null) {
                            $variant['image'] = $request['v_old_i_' . $Counter_img];
                        } else {
                            $variant['image'] = null;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                        $Counter_img++;
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
                    } else if ($request['v_old_i_' . $Counter_img] != null) {
                        $variant['image'] = $request['v_old_i_' . $Counter_img];
                    } else {
                        $variant['image'] = null;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                    $Counter_img++;
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
                } else if ($request['v_old_i_' . $Counter_img] != null) {
                    $variant['image'] = $request['v_old_i_' . $Counter_img];
                } else {
                    $variant['image'] = null;
                }
                array_push($variants, $variant);
                $Counter++;
                $Counter_img++;
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

        $unite = null;
        if ($request->unite != null) {
            $unite = $request->unite;
        }
        $old_price = 0;
        if ($request->old_price != null) {
            $old_price = $request->old_price;
        }
        $product->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'prix' => $request->standar_prix,
            'old_price' => $old_price,
            'unite' => $unite,
            'status' => $status,
            'confermed' => 0,
            'keywords' => $keywords,
            'min_quantity' => $min_qty,
            'variants' => $variants_saved,
        ]);

        /* save remplace main product image  */
        if ($request->main_image != null) {
            $fileName = time() . '_' . Str::slug($request->name, '_') . '_' . $Counter . '.' . $request['main_image']->guessExtension();
            $filePath = $request->file('main_image')->storeAs('Main_products', $fileName, 'public');
            $product_image = ProductImage::where('product_id', $product->id)->where('is_main', '1')->first();
           // unlink('storage/' . $product_image->path);
            $product_image->update([
                'path' => $filePath,
            ]);
        }



        //save detailed_image for product 
        if ($request->images != null) {
            //delete old images
            $images = ProductImage::where('product_id', $product->id)->where('is_main', 0)->get();

            foreach ($images as $image) {
           //     unlink('storage/' . $image->path);
            }
            $images = ProductImage::where('product_id', $product->id)->where('is_main', 0)->delete();
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
        }

        return redirect()->Route('products.index',app()->getLocale())->with('success', 'le produit : <strong>' . $product->name . '</strong> le produit a été mis à jour avec succès!');
    }
    public function admin_edit($language,$id)
    {
        if (!in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
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
        if (count($options) > 0) {
            $options = array_keys(get_object_vars($options[0]));
        }
        // calculate option values like : "red,blue,green"
        $optons_values_temp = [];
        $options_values = [];


        foreach ($options as $option) {
            foreach ($variants as $variant) {
                if (!in_array(get_object_vars($variant)[$option], $optons_values_temp)) {
                    array_push($optons_values_temp, get_object_vars($variant)[$option]);
                }
            }
            array_push($options_values, implode(",", $optons_values_temp));
            $optons_values_temp = [];
        }
        $qtys = [];
        $prixs = [];
        if (count($options) > 0) {
            $qtys = $options_values[count($options_values) - 2]; // this is qty 
            $prixs = $options_values[count($options_values) - 1]; // this is prix
            unset($options_values[count($options_values) - 2]);
            unset($options_values[count($options_values) - 1]);
        }
        //convert variants element from objects to arrays 
        $variants_as_array = [];
        foreach ($variants as $variant) {
            array_push($variants_as_array, (array)$variant);
        }
        // dd($product, $keywords, $options,$options_values,$qtys,$prixs,(array)$variants[0],$variants_as_array);
        return view('managment.products.admin.edit', compact('product', 'categreis', 'keywords', 'options', 'options_values', 'prixs', 'qtys', 'variants_as_array'));
    }
    public function admin_update(Request $request)
    {

        $product = Product::Find(decrypt($request->product_id));

        if (!in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            'description' => 'required|max:1000000',
            'category' => 'required',
            'name' => 'required'
        ]);
        if ($request->main_image != null) {
            $request->validate([
                'main_image' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        if ($request->images != null) {
            $request->validate([
                'images.*' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        if ($request->variants_images != null) {
            $request->validate([
                'variants_images.*' => 'mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        $values = [];
        $Counter = 0;
        foreach ($request->values as $value) {
            $values[$Counter] =  explode(",", $value);
            $Counter++;
        }
        unset($values[count($values) - 1]);

        $Counter = 0;
        $Counter_img = 0;
        // dd($request);
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
                                    var_dump($Counter, $value0, $value1, $value2, $request->allprices[$Counter]);
                                    $variant['prix'] = $request->allprices[$Counter];
                                }
                                if ($request->qtys == null) {
                                    $variant['qty'] = null;
                                } else {
                                    $variant['qty'] = $request->qtys[$Counter];
                                }
                                if ($request['v_i_' . $Counter] != null) {
                                    $fileName = time() . '_' . $request->name . '_' . $Counter . '.' . $request['v_i_' . $Counter]->guessExtension();
                                    $filePath = $request->file('v_i_' . $Counter)->storeAs('variants_pic', $fileName, 'public');
                                    $variant['image'] = $filePath;
                                } else if ($request['v_old_i_' . $Counter_img] != null) {
                                    $variant['image'] = $request['v_old_i_' . $Counter_img];
                                } else {
                                    $value['image'] = null;
                                }
                                array_push($variants, $variant);
                                $Counter++;
                                $Counter_img++;
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
                            if ($request['v_i_' . $Counter_img] != null) {
                                $fileName = time() . '_' . $request->name . '_' . $Counter_img . '.' . $request['v_i_' . $Counter_img]->guessExtension();
                                $filePath = $request->file('v_i_' . $Counter_img)->storeAs('variants_pic', $fileName, 'public');
                                $variant['image'] = $filePath;
                            } else if ($request['v_old_i_' . $Counter_img] != null) {
                                $variant['image'] = $request['v_old_i_' . $Counter_img];
                            } else {
                                $variant['image'] = null;
                            }
                            if ($Counter_img == 2) {
                            }
                            array_push($variants, $variant);
                            $Counter++;
                            $Counter_img++;
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
                        } else if ($request['v_old_i_' . $Counter_img] != null) {
                            $variant['image'] = $request['v_old_i_' . $Counter_img];
                        } else {
                            $variant['image'] = null;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                        $Counter_img++;
                    }
                } else {
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
                    } else if ($request['v_old_i_' . $Counter_img] != null) {
                        $variant['image'] = $request['v_old_i_' . $Counter_img];
                    } else {
                        $variant['image'] = null;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                    $Counter_img++;
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
                        } else if ($request['v_old_i_' . $Counter_img] != null) {
                            $variant['image'] = $request['v_old_i_' . $Counter_img];
                        } else {
                            $variant['image'] = null;
                        }
                        array_push($variants, $variant);
                        $Counter++;
                        $Counter_img++;
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
                    } else if ($request['v_old_i_' . $Counter_img] != null) {
                        $variant['image'] = $request['v_old_i_' . $Counter_img];
                    } else {
                        $variant['image'] = null;
                    }
                    array_push($variants, $variant);
                    $Counter++;
                    $Counter_img++;
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
                } else if ($request['v_old_i_' . $Counter_img] != null) {
                    $variant['image'] = $request['v_old_i_' . $Counter_img];
                } else {
                    $variant['image'] = null;
                }
                array_push($variants, $variant);
                $Counter++;
                $Counter_img++;
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
        $unite = null;
        if ($request->unite != null) {
            $unite = $request->unite;
        }
        $status = $product->status;
        if ($request->status != null) {
            $status = $request->status;
        }
        $confermed = $product->confermed;
        if ($request->confermed != null) {
            $confermed = $request->confermed;
        }
        $old_price = 0;
        if ($request->old_price != null) {
            $old_price = $request->old_price;
        }
        $product->update([
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'prix' => $request->standar_prix,
            'old_price' => $old_price,
            'unite' => $unite,
            'status' => $status,
            'confermed' => $confermed,
            'keywords' => $keywords,
            'min_quantity' => $min_qty,
            'variants' => $variants_saved,
        ]);
        /* save remplace main product image  */
        if ($request->main_image != null) {
            $fileName = time() . '_' . Str::slug($request->name, '_') . '_' . $Counter . '.' . $request['main_image']->guessExtension();
            $filePath = $request->file('main_image')->storeAs('Main_products', $fileName, 'public');
            $product_image = ProductImage::where('product_id', $product->id)->where('is_main', '1')->first();
           // unlink('storage/' . $product_image->path);
            $product_image->update([
                'path' => $filePath,
            ]);
        }
        //save detailed_image for product 
        if ($request->images != null) {
            //delete old images
            $images = ProductImage::where('product_id', $product->id)->where('is_main', 0)->get();

            foreach ($images as $image) {
            //    unlink('storage/' . $image->path);
            }
            $images = ProductImage::where('product_id', $product->id)->where('is_main', 0)->delete();
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
        }

        return redirect()->Route('products.index',app()->getLocale())->with('success', 'le produit : <strong>' . $product->name . '</strong> le produit a été mis à jour avec succès!');
    }
    public function admin_update_status(Request $request)
    {
        if (!in_array("products.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        if (Auth::user()->Role->id == 1) { // admin
            $product = Product::find(decrypt($request->product_id));
            $product->update([
                'status' => $request->status,
            ]);
        }
        return back()->with('success', 'les ststut du produit <strong>' . $product->id . '</strong>  a été mis à jour avec succès!');
    }
    public function admin_update_confirmation_product(Request $request)
    {
        if (!in_array("products.edit", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        if (Auth::user()->Role->id == 1) { // admin
            $product = Product::find(decrypt($request->product_id));
            if ($request->confermed == 1) {
                $product->update([
                    'confermed' => 1,
                ]);
            } else {
                $product->update([
                    'confermed' => 0,
                ]);
            }
        }
        return back()->with('success', 'le produit <strong>' . $product->id . '</strong>  a été mis à jour avec succès!');
    }
    public function admin_delete(Request $request)
    {
        if (!in_array("Admin", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        Product::FindOrFail(decrypt($request->product_id))->delete();
        return back()->with('success', 'le produit a été supprimer avec succès!');
    }
    public function vondeur_delete(Request $request)
    {
        if (!in_array("products.destroy", json_decode(Auth::user()->Role->permissions))) {
            abort(403, 'Unauthorized action.');
        }
        $product = Product::where('shop_id', Auth::user()->Shop()->first()->id)->FindOrFail(decrypt($request->product_id))->delete();
        return back()->with('success', 'le produit a été supprimer avec succès!');
    }
}
