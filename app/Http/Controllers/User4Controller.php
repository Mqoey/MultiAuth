<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User4Controller extends Controller
{
    public function index(){
        return view('user4.index')
        ->with('role', Auth::user()->role);
    }
}
