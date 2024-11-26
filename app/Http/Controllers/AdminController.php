<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Dashboard()
    {

        return view('dashboard');
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
    public function adminstrore (Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:,user',
        ]);

        if ($validator->fails()) {
            return redirect('admin/login-admin')
                        ->withErrors($validator)
                        ->withInput();
        }  
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,

        ]);

    }
    

}
