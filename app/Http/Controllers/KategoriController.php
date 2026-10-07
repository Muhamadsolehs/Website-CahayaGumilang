<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    // Read: Menampilkan daftar kategori
    public function index()
    {
        $kategori = KategoriModel::all();

        return view('page-admin.data-kategori.v_kategori', compact('kategori'));
    }

    // Create: Menampilkan form tambah kategori
    public function create()
    {
        return view('page-admin.data-kategori.v_create');
    }

    // Store: Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload file foto
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('kategori', 'public');
        }

        // Simpan data ke database
        KategoriModel::create([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $filePath ?? null, // Menyimpan path file ke database
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Edit: Menampilkan form edit kategori
    public function edit($id_kategori)
    {
        $kategori = KategoriModel::findOrFail($id_kategori);
        return view('page-admin.data-kategori.v_edit', compact('kategori'));
    }

    // Update: Mengupdate data kategori
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kategori = KategoriModel::findOrFail($id_kategori);

        // Upload file foto baru jika ada
        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('kategori', 'public');

            // Hapus foto lama jika ada
            if ($kategori->foto && Storage::disk('public')->exists($kategori->foto)) {
                Storage::disk('public')->delete($kategori->foto);
            }

            $kategori->foto = $filePath;
        }

        // Update data kategori
        $kategori->update([
            'nama_layanan' => $request->nama_layanan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $kategori->foto, // Gunakan foto yang baru jika diunggah
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Destroy: Menghapus kategori
    public function destroy($id_kategori)
    {
        $kategori = KategoriModel::findOrFail($id_kategori);

        // Hapus file foto jika ada
        if ($kategori->foto && Storage::disk('public')->exists($kategori->foto)) {
            Storage::disk('public')->delete($kategori->foto);
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
