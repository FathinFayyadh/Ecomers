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
        return back()->withErrors([
            'email' => 'Your credentials are wrong',
            'password' => 'Your credentials are wrong',
        ])->withInput();
    }
    function RegisterStore(Request $request)
    {

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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => 2,
        ]);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            if ($user->roles_id == 1) {
                return redirect()->route('Dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('login.create')->with('success', 'Registration successful!');
            }
        }
    }
    public function logout(Request $request)
    {
        if (Auth::check()) {
            $role = Auth::user()->roles_id;
            Auth::logout();
            $request->session()->invalidate();

            if ($role == 1) {
                return redirect()->route('login-admin')->with('success', 'You have been logged out successfully.');
            } elseif ($role == 2) {
                return redirect()->route('home')->with('success', 'You have been logged out successfully.');
            }
        }

        return redirect('/')->with('error', 'No active session found.');
    }

    public function show()
    {
        return view('profil-user');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && file_exists(public_path('storage/photos/' . $user->photo))) {
                unlink(public_path('storage/photos/' . $user->photo));
            }

            // Upload foto baru
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/photos'), $fileName);
            $user->photo = $fileName;
        }
        $user->save();
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
