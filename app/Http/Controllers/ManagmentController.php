<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagmentController extends Controller
{
    public function index()
    {
        if( Auth::user()->role_id == 5 ){
            abort(403, 'Unauthorized action.');
        } elseif( Auth::user()->role_id == 1 ){ //admin
            return view('managment.home.admin.index');
        }elseif( Auth::user()->role_id == 2 ){
            return view('managment.home.manager.index');
        }elseif( Auth::user()->role_id == 3 ){
            return view('managment.home.vondeur.index');
        }elseif( Auth::user()->role_id == 5 ){
            return view('managment.home.livreur.index');
        } else{
            abort(403, 'Unauthorized action.');
        }
    }
}
