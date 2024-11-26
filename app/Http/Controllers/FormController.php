<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function CreateProduct(Request $request){

      return view('admin.createProduct');
    }

    public function UserStore(Request $request){
      $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
    }

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();
        return redirect()->route('home');
    } else {
        return redirect()->route('login')
            ->with('error', 'Login failed: email or password is incorrect');
    }
    }
    

}
