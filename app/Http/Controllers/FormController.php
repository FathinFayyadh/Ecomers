<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{



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
        $user = Auth::user();
        return view('profil-user', compact('user'));
    }

    public function updateProfile($id)
    {
        $user = User::findOrFail($id);
        return view('FormUser.update-profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Update name dan gender
        $user->name = $request->name;
        $user->gender = $request->gender;
       
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'storage/users/' . $fileName;

            $file->move(public_path('storage/users'), $fileName);
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo));
            }
            $user->photo = $filePath;
        }
        $user->save();
        return redirect()->route('profile-user')->with('status', 'Profile updated successfully!');
    }
}
