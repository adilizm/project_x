<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagmentController extends Controller
{
    public function index()
    {
        // check that user is not a customer
        if( Auth::user()->role_id == 5 ){
            abort(403, 'Unauthorized action.');
        }
      
        return view('managment.index');
    }
}
