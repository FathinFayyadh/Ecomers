<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{



    public function LoginStore(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Regenerasi sesi
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan roles_id
            if ($user->roles_id == 1) {
                return redirect()->route('Dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->roles_id == 2) {
                return redirect()->route('home')->with('success', 'Welcome User!');
            }
        }

        // Gagal login
        return back()->withErrors([
            'email' => 'The provided email is not registered.',
            'password' => 'The provided password is incorrect.',
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
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',  // Pastikan password lama dimasukkan
            'new_password' => 'required|min:8|confirmed',  // Validasi password baru
        ]);

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah password lama cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Periksa apakah password baru sama dengan password lama
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'Password baru tidak boleh sama dengan password lama.']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);

        // Simpan perubahan
        if ($user->save()) {
            // Logout setelah password diperbarui
            Auth::logout();

            // Redirect ke halaman login
            return redirect()->route('login')->with('success', 'Password berhasil diperbarui. Silakan login kembali dengan password baru.');
        }

        // Jika terjadi kesalahan dalam menyimpan
        return back()->withErrors(['password' => 'Terjadi kesalahan saat memperbarui password.']);
    }
}
