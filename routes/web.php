<?php

use App\Http\Controllers\ManagmentController;
use App\Http\Controllers\RoleController;
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
    return view('welcome');
});

Route::prefix('managment')->middleware([Authenticate::class])->group(function () {
    Route::get('control', [ManagmentController::class,'index'])->name('managment.index');
    Route::get('roles', [RoleController::class,'index'])->name('roles.index');
    
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth'])->name('index');

require __DIR__.'/auth.php';
