<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Login()
    {
        return view('FormUser.login');
    }
    public function home()  
    {
        $products = product::all();
        return view('home-content', compact('products'));
    }
    public function register()  
    {
        return view('FormUser.register');
    }
    
    
    
    
}
