<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;


class AdminAuthController extends Controller
{
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login'); // Tampilkan form login admin
    }

    // Method untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('admin.register'); // Tampilkan form registrasi admin
    }

    // Method untuk memproses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        // Debugging: Cetak data admin yang ditemukan
        // if ($admin) {
        //     dd([
        //         'entered_password' => $request->password,
        //         'hashed_password' => $admin->password,
        //         'hash_check' => Hash::check($request->password, $admin->password),
        //     ]);
        // }        

        // Jika admin ditemukan dan password cocok (dengan hashing)
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }        

        return back()->withErrors(['login_error' => 'Invalid credentials'])->withInput();
    }

    // Method untuk memproses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'admin_name' => 'required|string|max:255', // Validasi untuk nama admin
            'username' => 'required|unique:admins|alpha_dash|min:3|max:20', // Validasi untuk username
            'password' => 'required|min:6|confirmed', // Validasi untuk password dan konfirmasi password
        ]);

        // Buat admin baru
        $admin = Admin::create([
            'admin_name' => $request->admin_name, // Simpan admin_name
            'username' => $request->username, // Simpan username
            'password' => bcrypt($request->password), // Hash password sebelum disimpan
        ]);

        // Login admin setelah registrasi
        Auth::guard('admin')->login($admin);

        // Redirect ke halaman welcome
        return redirect()->route('admin.login')->with('success', 'Registration successful!');
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}