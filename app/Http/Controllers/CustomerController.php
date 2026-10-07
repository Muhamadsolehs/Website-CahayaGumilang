<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesananModel;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function detailPesanan($id)
    {
        $pesanan = PesananModel::findOrFail($id);


        return view('page-customer.v_detailpesanan', compact('pesanan'));
    }

    public function cancel($id_pesanan)
    {
        // Cari pesanan berdasarkan ID
        $pesanan = PesananModel::findOrFail($id_pesanan);

        // Periksa apakah masih dalam rentang H-3
        $selisihHari = Carbon::now()->diffInDays(Carbon::parse($pesanan->tanggal_acara), false);
        if ($selisihHari < 3) {
            return redirect()->back()->withErrors(['error' => 'Pesanan hanya dapat dibatalkan H-3 sebelum acara.']);
        }

        // Update status pesanan menjadi "Dibatalkan"
        $pesanan->status_pesanan = 'Cancel';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
    }


}
