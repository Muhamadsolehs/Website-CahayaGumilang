<?php
namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel
        $kategori = KategoriModel::all();

        // Mengirim data ke view katalog
        return view('page-customer.v_katalog', compact('kategori'));
    }

    public function pesan($id)
    {
        // Mengambil data layanan berdasarkan ID
        $layanan = KategoriModel::findOrFail($id);

        // Mengirim data ke view pesan
        return view('page-customer.v_pesan', compact('layanan'));
    }
}

?>
