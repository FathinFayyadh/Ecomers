<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Dashboard()
    {

        return view('Admin.dashboard');
    }
    public function CreateProduct(){

        return view('admin.FormAdmin.createProduct');
      }
    public function loginAdmin(){
        return view('admin.FormAdmin.login-Admin');
    }

    public function manageproduct(){
        return view('admin.manageProduct');
    }
    public function getproduct(Request $request){
        
    }
    

}
