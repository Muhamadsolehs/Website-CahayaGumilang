<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\PembayaranModel;
use App\Models\PesananModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{

    public function index2()
    {
        $pembayaran = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-admin.data-pembayaran.v_pelunasan', compact('pembayaran')); // Kirim data ke view
    }
    public function index3()
    {
        $id_user = Auth::id();

        $pesanan = PesananModel::where('id_user', $id_user)
            ->with('pembayaran')
            ->get();

        return view('page-customer.v_history', compact('pesanan')); // Kirim data ke view
    }

    // Fungsi untuk menangani pembayaran
    public function bayar(Request $request)
{
    // Ambil ID pesanan dari form
    $id_pesanan = $request->input('id_pesanan');

    // Cari data pesanan berdasarkan ID
    $pesanan = PesananModel::find($id_pesanan);

    if (!$pesanan) {
        return redirect()->back()->withErrors(['id_pesanan' => 'Pesanan tidak ditemukan.']);
    }

    // Ambil data kategori berdasarkan id_kategori pada pesanan
    $kategori = KategoriModel::find($pesanan->id_kategori);

    if (!$kategori) {
        return redirect()->back()->withErrors(['id_kategori' => 'Kategori tidak ditemukan.']);
    }

    // Hitung jumlah pelunasan
    $total_tagihan = $pesanan->total_tagihan; // Total tagihan dari database
    $jumlah_dp = $pesanan->jumlah_dp; // DP dari database
    $jumlah_pelunasan = $total_tagihan - $jumlah_dp; // Sisa pembayaran

    if ($jumlah_pelunasan <= 0) {
        return redirect()->back()->withErrors(['pelunasan' => 'Pesanan ini sudah lunas.']);
    }

    // Midtrans Configuration
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Midtrans Payment Parameters
    $params = [
        'transaction_details' => [
            // Tambahkan timestamp atau string unik
            'order_id' => $pesanan->id_pesanan . '-' . time(),
            'gross_amount' => $jumlah_pelunasan,
        ],
        'customer_details' => [
            'first_name' => $pesanan->nama,
            'phone' => $pesanan->telepon,
            'address' => $pesanan->lokasi_acara,
        ],
    ];


    // Generate Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Return to the view with Snap Token
    return view('page-customer.v_detailpelunasan', compact('snapToken', 'pesanan', 'jumlah_pelunasan'));
}


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $pesanan = PesananModel::find($request->order_id);
                $pesanan->update(['statusBayarPelunasan' => 'Dibayar']);
            }
        }
    }
    public function index()
    {
        $pesanan = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-customer.v_pelunasan', compact('pesanan')); // Kirim data ke view
    }

    public function pelunasanSukses(Request $request)
    {
        $id_pesanan = $request->query('id_pesanan');

        // Jika transaksi sukses (berstatus 'settlement' atau 'capture')

        // Update status di tabel pemesanan menjadi 'Sudah'
        // $pemesanan = Pemesanan::where('id_pmsan', $orderId)->first();
        $pemesanan = PesananModel::with('user')->where('id_pesanan', $id_pesanan)->first();
        $pesanan = PesananModel::all();


        if ($pemesanan) {
            $pemesanan->statusBayarPelunasan = 'Dibayar';
            $pemesanan->tanggal_bayar_pelunasan = now();
            $pemesanan->save();
        }

        return view('page-customer.v_pelunasan', compact('pesanan'));
    }


    public function bayar2(Request $request)
    {
        // Ambil ID pesanan dari form
        $id_pesanan = $request->input('id_pesanan');

        // Cari data pesanan berdasarkan ID
        $pesanan = PesananModel::find($id_pesanan);

        if (!$pesanan) {
            return redirect()->back()->withErrors(['id_pesanan' => 'Pesanan tidak ditemukan.']);
        }

        // Ambil data kategori berdasarkan id_kategori pada pesanan
        $kategori = KategoriModel::find($pesanan->id_kategori);

        if (!$kategori) {
            return redirect()->back()->withErrors(['id_kategori' => 'Kategori tidak ditemukan.']);
        }

        // Hitung jumlah pelunasan
        $total_tagihan = $pesanan->total_tagihan; // Total tagihan dari database
        $jumlah_dp = $pesanan->jumlah_dp; // DP dari database
        $jumlah_pelunasan = $total_tagihan - $jumlah_dp; // Sisa pembayaran

        if ($jumlah_pelunasan <= 0) {
            return redirect()->back()->withErrors(['pelunasan' => 'Pesanan ini sudah lunas.']);
        }

        // Midtrans Configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Midtrans Payment Parameters
        $params = [
            'transaction_details' => [
                // Tambahkan timestamp atau string unik
                'order_id' => $pesanan->id_pesanan . '-' . time(),
                'gross_amount' => $jumlah_dp,
            ],
            'customer_details' => [
                'first_name' => $pesanan->nama,
                'phone' => $pesanan->telepon,
                'address' => $pesanan->lokasi_acara,
            ],
        ];


        // Generate Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Return to the view with Snap Token
        return view('page-customer.v_detailpesanan', compact('snapToken', 'pesanan', 'jumlah_pelunasan'));
    }


        public function callback2(Request $request)
        {
            $serverKey = config('midtrans.server_key');
            $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            if ($hashed == $request->signature_key) {
                if ($request->transaction_status == 'capture') {
                    $pesanan = PesananModel::find($request->order_id);
                    $pesanan->update(['statusBayarPelunasan' => 'Dibayar']);
                }
            }
        }



}
