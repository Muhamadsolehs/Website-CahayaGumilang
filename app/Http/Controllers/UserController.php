<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    // Read: Menampilkan daftar pengguna
    public function index()
    {
        $user = UserModel::all();

        return view('page-admin.data-pengguna.v_pengguna', compact('user'));
    }

    // Create: Menampilkan form tambah pengguna
    public function create()
    {
        return view('page-admin.data-pengguna.v_create');
    }

    // Store: Menyimpan data pengguna baru
    public function store(Request $request)
{
    $request->validate([

        'username' => 'required|unique:tb_user|max:50',
        'password' => 'required|min:8',
        'role' => 'required',
        'nama_lengkap' => 'required|max:50',
        'nomor_telepon' => 'required|max:50',
    ], [
        'password.min' => 'Password harus memiliki minimal 8 karakter.',
    ]);

    UserModel::create([
        'username' => $request->username,
        'password' => bcrypt($request->password), // Enkripsi password
        'role' => $request->role,
        'nama_lengkap' => $request->nama_lengkap,
        'nomor_telepon' => $request->nomor_telepon,
    ]);

    return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
}


    // Edit: Menampilkan form edit pengguna
    public function edit($id_user)
    {
        $user = UserModel::findOrFail($id_user);
        return view('page-admin.data-pengguna.v_edit', compact('user'));
    }

    // Update: Mengupdate data pengguna

    public function update(Request $request, UserModel $user)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'nama_lengkap' => 'required',
            'nomor_telepon' => 'required'
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('user.index')->with('success','User Has Been updated successfully');
    }

    public function destroy($id_user)
    {
        $user = UserModel::findOrFail($id_user);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
