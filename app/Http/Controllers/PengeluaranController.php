<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengeluaranModel;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    protected $table = 'tb_pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    // Read: Menampilkan daftar pengguna
    public function index()
    {
        $pengeluaran = PengeluaranModel::all();

        return view('page-admin.data-pengeluaran.v_pengeluaran', compact('pengeluaran'));
    }

    // Create: Menampilkan form tambah pengguna
    public function create()
    {
        return view('page-admin.data-pengeluaran.v_create');
    }

    // Store: Menyimpan data pengguna baru
    public function store(Request $request)
{
    $request->validate([
        'jumlah' => 'required',
        'tanggal_pengeluaran' => 'required',
        'deskripsi' => 'required',
    ]);

    PengeluaranModel::create([
        'jumlah' => $request->jumlah,
        'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('pengeluaran.index')->with('success', 'pengeluaran berhasil ditambahkan.');
}


    // Edit: Menampilkan form edit pengguna
    public function edit($id_pengeluaran)
    {
        $pengeluaran = PengeluaranModel::findOrFail($id_pengeluaran);
        return view('page-admin.data-pengeluaran.v_edit', compact('pengeluaran'));
    }

    // Update: Mengupdate data pengguna

    public function update(Request $request, PengeluaranModel $pengeluaran)
    {
        $request->validate([
            'jumlah' => 'required',
            'tanggal_pengeluaran' => 'required',
            'deskripsi' => 'required',
        ]);

        $pengeluaran->fill($request->post())->save();

        return redirect()->route('pengeluaran.index')->with('success','pengeluaran Has Been updated successfully');
    }


    // Delete: Menghapus data pengguna
    public function destroy($id_pengeluaran)
    {
        $pengeluaran = PengeluaranModel::findOrFail($id_pengeluaran);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'pengeluaran berhasil dihapus.');
    }
    public function cetak()
    {
        $pengeluaran = PengeluaranModel::all();
        $pdf = Pdf::loadView('page-admin.data-pengeluaran.laporan', compact('pengeluaran'));
        return $pdf->download('laporan_pengeluaran.pdf');
    }
}
