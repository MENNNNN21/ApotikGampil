<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function produk(){
        return view('produk');
    }
    public function tentang(){
        return view('tentang');
    }
    public function kontak(){
        return view('kontak');
    }
    public function cart(){
        return view('cart');
    }
   
}
