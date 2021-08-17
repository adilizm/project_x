<?php

use App\Http\Controllers\ManagmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VondeurController;
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

Route::get('/', function () {   return view('frantend.home');})->name('home');
Route::get('/register_vondeur', function () { return view('register_vondeur'); })->name('login.vondeur');
Route::post('/register_vondeur', [VondeurController::class,'create_vondeur'])->name('create_vondeur');

Route::prefix('managment')->middleware([Authenticate::class])->group(function () {
    Route::get('control', [ManagmentController::class,'index'])->name('managment.index');

    Route::get('roles', [RoleController::class,'index'])->name('roles.index');
    Route::get('roles/creer', [RoleController::class,'create'])->name('roles.create');
    Route::post('roles/store', [RoleController::class,'store'])->name('roles.store');
    Route::get('roles/modifier/{id}', [RoleController::class,'edit'])->name('roles.edit');
    Route::put('roles/update/{id}', [RoleController::class,'update'])->name('roles.update');
    Route::get('roles/destroy/{id}', [RoleController::class,'destroy'])->name('roles.destroy');

    Route::get('users', [UsersController::class,'index'])->name('users.index');
    Route::get('users/creer', [UsersController::class,'create'])->name('users.create');
    Route::post('users/store', [UsersController::class,'store'])->name('users.store');
    Route::post('users/change_Role', [UsersController::class,'change_role'])->name('users.change_Role');
    Route::get('users/login/{id}', [UsersController::class,'login'])->name('users.login');

    
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';
