<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Login()
    {
        return view('FormUser.login');
    }
    public function home()  
    {
        return view('home-content');
    }
    public function register()  
    {
        return view('FormUser.register');
    }
    public function logout()  
    {
        // return view('login');
    }
    
    
}
