<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function CreateProduct(Request $request){

      return view('admin.createProduct');
    }

    public function LoginStore (Request $request){
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
            $user = Auth::user();
            if ($user) {
                if ($user->roles_id == 1) {
                    return redirect()->route('Dashboard');
                } else {
                    return redirect()->route('home');
                }
            }
        }
        return back()->withErrors([
            'email' => 'Your credentials are wrong',
            'password' => 'Your credentials are wrong',
        ])->withInput();
    }
    public function RegisterStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required',
        ]); 
        if ($validator->fails()) {
            return redirect()->route('register.create')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),            
            'gender'=>$request->gender,
        ]);
        $user->assignRole('user');
        if ($user) {
            Auth::login($user);
            return redirect()->route('login.create')->with('success', 'Register success');
        } else {
            return redirect()->route('register.create')->with('error', 'Register failed');
        }

       
    }
    

}
