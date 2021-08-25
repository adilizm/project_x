<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManagmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VondeurController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Middleware\Authenticate;

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

Route::get('/', function () {
    return view('frantend.home');
})->name('home');
Route::get('/register_vondeur', [VondeurController::class, 'create_vondeur'])->name('login.vondeur');
Route::post('/save_vondeur', [VondeurController::class, 'Register_vondeur'])->name('create_vondeur');


Route::get('shops', [ShopController::class, 'index'])->name('shops.index');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('shops/create', [ShopController::class, 'create'])->name('shops.create');
    Route::post('shops/enregistre', [ShopController::class, 'save'])->name('shops.save');
    Route::get('shops/enregistre/complete', [ShopController::class, 'register_complet'])->name('shops.register_complet');

    Route::post('client/vondeur', [VondeurController::class, 'VondeurController'])->name('client_to_vondeur');
});


Route::prefix('managment')->middleware([Authenticate::class])->group(function () {

    Route::get('control', [ManagmentController::class, 'index'])->name('managment.index');
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');

    /* roles Routes */
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/creer', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/modifier/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    /* useres Routes */
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/creer', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
    Route::post('users/change_Role', [UsersController::class, 'change_role'])->name('users.change_Role');
    Route::get('users/login/{id}', [UsersController::class, 'login'])->name('users.login');

    /* useres Routes */
    Route::get('categorie', [CategoryController::class, 'index'])->name('category.index');
    Route::get('categorie/creer', [CategoryController::class, 'create'])->name('category.create');
    Route::post('categorie/store', [CategoryController::class, 'store'])->name('category.store');



    Route::prefix('vendeur')->group(function () {
        //this route may neot be important check it 
        Route::get('control', [ManagmentController::class, 'index'])->name('managment.vondeur.index');

        Route::prefix('products')->group(function () {
            Route::get('create', [ProductsController::class, 'vondeur_create'])->name('vondeur.products.create');
            Route::get('edit/{id}', [ProductsController::class, 'vondeur_edit'])->name('vondeur.products.edit');
            Route::post('store', [ProductsController::class, 'vondeur_store'])->name('vondeur.products.store');
            Route::post('update', [ProductsController::class, 'vondeur_update'])->name('vondeur.products.update');
        });
    });
    Route::prefix('admin')->group(function () {

        Route::prefix('products')->group(function () {
            Route::post('update', [ProductsController::class, 'admin_update_status'])->name('admin.products.admin_update_status');
            Route::post('update_confirmation', [ProductsController::class, 'admin_update_confirmation_product'])->name('admin.products.admin_update_confirmation_product');
        });
    });
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth'])->name('index');

require __DIR__ . '/auth.php';
