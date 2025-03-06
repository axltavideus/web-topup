<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

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

    // Cek login menggunakan guard admin
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->route('admin.login');  // Redirect ke dashboard admin
    }
    // Jika login gagal, kembalikan ke halaman login dengan pesan error
    return back()->withErrors([
        'login_error' => 'Invalid credentials. Please check your username and password.',
    ])->withInput();
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