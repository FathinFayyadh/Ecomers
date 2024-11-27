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
    public function LoginAdminStore (Request $request){
        $validator = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login-admin')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('Dashboard');
        }
        return back()->withErrors([
            'email' => 'Your credentials are wrong',
            'password' => 'Your credentials are wrong',
        ])->withInput();
    }
    public function getproduct(Request $request){
        
    }
    

}
