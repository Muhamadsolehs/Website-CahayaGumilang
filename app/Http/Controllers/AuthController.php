<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('sesi.v_login');
    }

    // Fungsi untuk proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('home');
            } elseif ($user->role === 'customer') {
                return redirect()->route('home2');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Role tidak valid.']);
            }
        }

        return redirect()->back()->withErrors(['username' => 'Username atau password salah.']);
    }

    // Fungsi untuk menampilkan halaman registrasi
    public function showRegisterForm()
    {
        return view('sesi.v_registrasi');
    }

    // Fungsi untuk proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:tb_user,username',
            'password' => 'required|string|min:8',
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        // Buat user baru
        UserModel::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'customer', // Default role sebagai customer
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
