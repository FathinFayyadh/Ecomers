<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function CreateProduct(Request $request)
    {

        return view('admin.createProduct');
    }

    public function LoginStore(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user(); 
            if ($user->roles_id == 1) {
                return redirect()->route('Dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->roles_id == 2) {                
                return redirect()->route('home')->with('success', 'Welcome User!');
            }
        }
        // Jika gagal login (kredensial salah)
        return back()->withErrors([
            'email' => 'Your credentials are wrong',
            'password' => 'Your credentials are wrong',
        ])->withInput();
    }

    public function RegisterStore(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => 2, // Default role untuk pengguna biasa
        ]);

        // Jika berhasil, login pengguna dan arahkan berdasarkan role
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            if ($user->roles_id == 1) {
                return redirect()->route('Dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('login.create')->with('success', 'Registration successful!');
            }
        }

        // Jika gagal, kembalikan ke halaman register dengan pesan error
        return redirect()->route('register.create')->with('error', 'Registration failed');
    }
}
