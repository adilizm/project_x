<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagmentController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VondeurController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TranslationController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\city_checker;
use App\Http\Middleware\NotBanned;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([city_checker::class])->group(function () {
    Route::redirect('/', '/' . App::getLocale());
});


Route::group(['prefix' => '{language}'], function () {
    // just for test 
    Route::get('/konly', [HomeController::class, 'index'])->name('home');
/////////////////////////////////////////

    Route::get('Select_city', [HomeController::class, 'Select_city'])->name('Select_city');
    Route::get('store_city/{id}', [HomeController::class, 'store_city'])->name('store_city');

    Route::get('change_language/{key}', [LanguageController::class, 'language_changer'])->name('change_languageyy');


    /* Login_required */
    Route::get('Login_required', [HomeController::class, 'Login_required'])->name('Login_required');


    Route::get('/', [HomeController::class, 'index'])->middleware([city_checker::class])->name('home');
    Route::get('/register_vondeur', [VondeurController::class, 'create_vondeur'])->middleware('guest')->name('login.vondeur');
    Route::get('/register_delivery', [DeliveryController::class, 'create_delivery'])->middleware('guest')->name('login.delivery');
    Route::post('/delivery/signup', [DeliveryController::class, 'delivery_signup'])->middleware('guest')->name('delivery.signup');
    Route::get('/Banned_user', [UsersController::class, 'banned_user'])->name('banned.user');
    Route::post('/save_vondeur', [VondeurController::class, 'Register_vondeur'])->name('create_vondeur');

    Route::middleware([city_checker::class])->group(function () {

        /* public category */
        Route::get('/categorie/{slug}', [HomeController::class, 'Category'])->name('category.page');

        /* public products */
        Route::get('/produit/{slug}', [HomeController::class, 'Product'])->name('product.index');
        Route::post('/produit/add_to_cart', [OrderController::class, 'add_to_cart'])->name('add_to_cart');
        Route::post('/produit/encreas_qty', [OrderController::class, 'encreas_qty'])->name('encreas_qty');
        Route::post('/produit/decreas_qty', [OrderController::class, 'decreas_qty'])->name('decreas_qty');
        Route::post('/produit/remove_from_carte', [OrderController::class, 'remove_from_carte'])->name('remove_from_carte');

        /* card */
        Route::get('panier', [HomeController::class, 'panier'])->name('panier');


        /* search */
        Route::post('search', [HomeController::class, 'search'])->name('search');

        /* create order */
        Route::post('create/order', [OrderController::class, 'Create_order'])->name('create_order');
        Route::get('select/position', [OrderController::class, 'Select_position'])->name('select_position');

        Route::post('Store_shipping_price_and_latlng', [OrderController::class, 'Store_shipping_price_and_latlng'])->name('Store_shipping_price_and_latlng');
    });
    Route::middleware([Authenticate::class, NotBanned::class, city_checker::class])->group(function () {

        /* profile settings */
        Route::get('mon-profil', [UsersController::class, 'My_profile'])->name('myprofil');

        Route::get('shops/create', [ShopController::class, 'create'])->name('shops.create');
        Route::post('shops/enregistre', [ShopController::class, 'save'])->name('shops.save');
        Route::get('shops/enregistre/complete', [ShopController::class, 'register_complet'])->name('shops.register_complet');

        Route::post('client/vondeur', [VondeurController::class, 'VondeurController'])->name('client_to_vondeur');
    });


    Route::prefix('managment')->middleware([Authenticate::class, NotBanned::class])->group(function () {

        Route::get('control', [ManagmentController::class, 'index'])->name('managment.index');
        Route::get('products', [ProductsController::class, 'index'])->name('products.index');

        /* roles Routes */
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/creer', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/modifier/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

        /* users Routes */
        Route::get('users', [UsersController::class, 'index'])->name('users.index');
        Route::get('users/creer', [UsersController::class, 'create'])->name('users.create');
        Route::get('users/edit/{id}', [UsersController::class, 'edit_user'])->name('users.edit');
        Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
        Route::post('users/change_Role', [UsersController::class, 'change_role'])->name('users.change_Role');
        Route::get('users/login/{id}', [UsersController::class, 'login'])->name('users.login');
        Route::post('users/update', [UsersController::class, 'update'])->name('users.update');
        Route::get('users/update-password', [UsersController::class, 'update_password'])->name('users.update.password');
        Route::get('users/orders', [UsersController::class, 'user_orders'])->name('users.orders');

        /* categorie Routes */
        Route::get('categorie', [CategoryController::class, 'index'])->name('category.index');
        Route::get('categorie/creer', [CategoryController::class, 'create'])->name('category.create');
        Route::post('categorie/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('categorie/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('categorie/update', [CategoryController::class, 'update'])->name('category.update');

        /* shops routes */
        Route::get('magasins', [ShopController::class, 'index'])->name('shops.index');
        Route::prefix('manager/magasins')->group(function () {
            Route::get('edit/{id}', [ShopController::class, 'manager_edit_shop'])->name('manager.shops.manager_edit_shop');
            Route::post('update', [ShopController::class, 'manager_update_shop'])->name('manager.shops.manager_update_shop');
        });
        /* Cities routes */
        Route::get('villes', [CitiesController::class, 'index'])->name('cities.index');
        Route::post('villes/save', [CitiesController::class, 'store'])->name('cities.store');

        /* Orders routes */
        Route::post('order/store', [OrderController::class, 'Store_order'])->name('store_order');
        Route::post('order/update_order_status', [OrderController::class, 'update_order_status'])->name('update_order_status');
        Route::post('order/update_order_delivery', [OrderController::class, 'update_order_delivery'])->name('update_order_delivery');
        Route::get('orders/index', [OrderController::class, 'Orders_index'])->name('orders.index');
        Route::get('orders/manager/edit/{id}', [OrderController::class, 'manager_edit_order'])->name('orders.manager.manager_edit_order');
        
        
        
        /* delivery managment */
        Route::get('delivery/index', [DeliveryController::class, 'deliveries_index'])->name('delivery.index');
        Route::post('delivery/update/activity', [DeliveryController::class, 'update_delivery_activity'])->name('delivery.update_delivery_activity');
        Route::post('delivery/update/activation', [DeliveryController::class, 'update_delivery_activation'])->name('delivery.update_delivery_activation');
        Route::get('delivery/edit/{id}', [DeliveryController::class, 'edit_delivery'])->name('delivery.edit');
        Route::post('delivery/update_info/', [DeliveryController::class, 'Delivery_update_info'])->name('delivery.update_info');

        /* managers managment */

        Route::get('managers/create', [ManagersController::class, 'create'])->name('managers.create');
        Route::get('managers', [ManagersController::class, 'index'])->name('managers.index');
        Route::post('managers/store', [ManagersController::class, 'store'])->name('managers.store');
        Route::post('managers/change_bann_status', [ManagersController::class, 'change_bann_status'])->name('manager.change_bann_status');

        /* delivery routs */
        Route::prefix('delivery')->group(function () {
            Route::prefix('orders')->group(function () {
                Route::get('history', [OrderController::class, 'deliver_orders_history'])->name('orders.delivery.orders_history');
                Route::post('orders/take_order', [OrderController::class, 'take_order'])->name('orders.take_order');
                Route::get('orders/orders_in_progress', [OrderController::class, 'orders_in_progress'])->name('orders.orders_in_progress');
                Route::post('order/delivery_change_delivery_status/{id}', [OrderController::class, 'delivery_change_delivery_status'])->name('delivery_change_delivery_status');
                Route::get('order/delivery_show_order/{id}', [OrderController::class, 'delivery_show_order'])->name('delivery_show_order');

            });
        });

        Route::prefix('vendeur')->group(function () {
            //this route may neot be important check it 
            Route::get('control', [ManagmentController::class, 'index'])->name('managment.vondeur.index');

            Route::prefix('products')->group(function () {
                Route::get('create', [ProductsController::class, 'vondeur_create'])->name('vondeur.products.create');
                Route::get('edit/{id}', [ProductsController::class, 'vondeur_edit'])->name('vondeur.products.edit');
                Route::post('store', [ProductsController::class, 'vondeur_store'])->name('vondeur.products.store');
                Route::post('update', [ProductsController::class, 'vondeur_update'])->name('vondeur.products.update');
                Route::post('delete', [ProductsController::class, 'vondeur_delete'])->name('vondeur.products.delete');
            });
        });
        Route::prefix('admin')->group(function () {

            Route::prefix('site')->group(function () {
                Route::get('index', [WebsiteController::class, 'index'])->name('website.management.index');
                Route::get('home_page', [WebsiteController::class, 'edit_home_page'])->name('website.management.edit_home_page');
                Route::post('update_10_top_requested_products_home_page_', [WebsiteController::class, 'update_10_top_requested_products'])->name('website.management.update_10_top_requested_products');
            });

            Route::prefix('products')->group(function () {
                Route::post('update_status', [ProductsController::class, 'admin_update_status'])->name('admin.products.admin_update_status');
                Route::post('update_confirmation', [ProductsController::class, 'admin_update_confirmation_product'])->name('admin.products.admin_update_confirmation_product');
                Route::get('edit/{id}', [ProductsController::class, 'admin_edit'])->name('admin.products.edit');
                Route::post('update', [ProductsController::class, 'admin_update'])->name('admin.products.update');
                Route::post('delete', [ProductsController::class, 'admin_delete'])->name('admin.products.delete');
            });
            Route::prefix('shops')->group(function () {
                Route::get('edit/{id}', [ShopController::class, 'admin_edit_shop'])->name('admin.shops.admin_edit_shop');
                Route::post('update', [ShopController::class, 'admin_update_shop'])->name('admin.shops.admin_update_shop');
            });

            /* Orders routes */
            Route::prefix('orders')->group(function () {
                Route::get('edit/{id}', [OrderController::class, 'admin_edit_order'])->name('admin.orders.admin_edit_order');
            });

            /* marketing routes */
            Route::get('marketing', [MarketingController::class, 'index'])->name('marketing.index');
            Route::post('marketing/update', [MarketingController::class, 'set_top_annonces'])->name('marketing.update.top_annonces');
            Route::post('marketing/create_slider', [MarketingController::class, 'create_new_slider'])->name('marketing.create_new_slider');
            Route::post('marketing/update_slider', [MarketingController::class, 'update_slider'])->name('marketing.update_slider');
            Route::post('marketing/delete_slider', [MarketingController::class, 'delete_slider'])->name('marketing.delete_slider');

            /* languages routes */
            Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
            Route::post('languages/update/default', [LanguageController::class, 'update_default'])->name('languages.update_default');
            Route::get('languages/edit/{id}', [LanguageController::class, 'language_edit'])->name('languages.language_edit');

            /* Translation routes */
            Route::post('translation/update', [TranslationController::class, 'update'])->name('Translation.update');

          
            /* shipping configuration */
            Route::get('configuration/shipping', [WebsiteController::class, 'Shipping_configuration'])->name('shipping.configuration.index');
            Route::post('configuration/shipping/update', [WebsiteController::class, 'Shipping_configuration_update'])->name('shipping.update_delivry_fee');
        });
    });

    Route::get('/index', function () {
        return view('index');
    })->middleware(['auth'])->name('index');

    require __DIR__ . '/auth.php';
});
