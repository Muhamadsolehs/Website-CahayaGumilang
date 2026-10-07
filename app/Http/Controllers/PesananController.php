<?php

namespace App\Http\Controllers;


use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\PesananModel;
use App\Models\KategoriModel;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{

    protected $table = 'tb_pesanan';
    protected $primaryKey = 'id_pesanan';

    public function index()
    {
        $pesanan = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-admin.data-pesanan.v_pesanan', compact('pesanan')); // Kirim data ke view
    }
    public function index2()
    {
        $id_user = Auth::id();

        // Ambil data pesanan hanya untuk id_user yang sedang login
        $pesanan = PesananModel::where('id_user', $id_user)
            ->with('kategori') // Include relasi kategori jika ada
            ->get();

        return view('page-customer.v_history', compact('pesanan')); // Kirim data ke view
    }
    public function index3()
    {
        $pesanan = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-admin.data-jadwal.v_jadwal', compact('pesanan')); // Kirim data ke view
    }

    public function index5()
    {
        $pesanan = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-customer.v_dp', compact('pesanan')); // Kirim data ke view
    }

    public function index6()
    {
        $pesanan = PesananModel::all(); // Ambil semua data dari model PesananModel
        return view('page-admin.data-pembayaran.v_dp', compact('pesanan')); // Kirim data ke view
    }

    public function create($id)
    {
        $bookedDates = PesananModel::pluck('tanggal_acara')->toArray();

        $layanan = KategoriModel::findOrFail($id);
        return view('page-customer.v_pesan', compact('layanan','bookedDates'));
    }

    // Store: Menyimpan data pengguna baru
    // Untuk mengambil data user yang login


    public function store(Request $request)
    {

        // Validasi input dari form
        $request->validate([
            'id_kategori' => 'required|exists:tb_kategori_layanan,id_kategori',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'lokasi_acara' => 'required|string|max:255',
            'tanggal_acara' => 'required|date|unique:tb_pesanan,tanggal_acara',]);

        $kategori = KategoriModel::find($request->id_kategori);

        if (!$kategori) {
            return redirect()->back()->withErrors(['id_kategori' => 'Kategori tidak ditemukan.']);
        }

        $totalTagihan = $kategori->harga;
        $jumlah_dp = $totalTagihan * 30 / 100;

        // Ambil ID user yang sedang login
        $idUser = Auth::id();

        // Simpan data pesanan
        $pesanan = PesananModel::create([
            'id_kategori' => $request->id_kategori,
            'id_user' => $idUser, // ID user otomatis diambil dari user yang login
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'lokasi_acara' => $request->lokasi_acara,
            'tanggal_acara' => $request->tanggal_acara,
            'waktu_acara' => $request->waktu_acara,
            'total_tagihan' => $totalTagihan, // Menyimpan total tagihan
            'jumlah_dp' => $jumlah_dp, // Menyimpan jumlah DP
            'status_pesanan' => 'Pending', // Status default
        ]);

        // Redirect ke halaman detail pesanan setelah berhasil
        return redirect()->route('customer.detail', ['id' => $pesanan->id_pesanan])
            ->with('success', 'Pesanan berhasil dibuat.');
    }



    public function updateStatus(Request $request, $id)
    {
        $pesanan = PesananModel::find($id); // Cari pesanan berdasarkan ID
        if ($pesanan) {
            // Update status pesanan berdasarkan status saat ini
            if ($pesanan->status_pesanan == 'Pending') {
                $pesanan->status_pesanan = 'Diproses';
            } elseif ($pesanan->status_pesanan == 'Diproses') {
                $pesanan->status_pesanan = 'Selesai';
            } else {
                $pesanan->status_pesanan = 'Pending'; // Jika sudah selesai, kembali ke Pending (Opsional)
            }
            $pesanan->save(); // Simpan perubahan ke database
        }
        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    public function destroy($id_pesanan)
    {
        $pesanan = PesananModel::findOrFail($id_pesanan);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'pengeluaran berhasil dihapus.');
    }

    public function bayar(Request $request)
{
    // Ambil data kategori berdasarkan id_kategori
    $kategori = KategoriModel::find($request->id_kategori);

    if (!$kategori) {
        return redirect()->back()->withErrors(['id_kategori' => 'Kategori tidak ditemukan.']);
    }

    // Hitung total tagihan berdasarkan harga kategori
    $total_tagihan = $kategori->harga;
    $jumlah_dp = $total_tagihan * 40 / 100; // Contoh DP 30% dari total tagihan

    // Simpan data pesanan ke dalam database
    $pesanan = PesananModel::create([
        'id_kategori' => $request->id_kategori,
        'id_user' => Auth::id(),
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'lokasi_acara' => $request->lokasi_acara,
        'tanggal_acara' => $request->tanggal_acara,
        'waktu_acara' => $request->waktu_acara,
        'total_tagihan' => $total_tagihan,
        'jumlah_dp' => $jumlah_dp,
        'status_pesanan' => 'Pending',
        'statusBayarDP' => 'Pending',
    ]);



    // Midtrans Configuration
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Midtrans Payment Parameters
    $params = [
        'transaction_details' => [
            'order_id' => $pesanan->id_pesanan,
            'gross_amount' => $pesanan->jumlah_dp,
        ],
        'customer_details' => [
            'first_name' => $request->nama,
            'phone' => $request->telepon,
            'address' => $request->lokasi_acara,
        ],
    ];

    // Generate Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Return to the view with Snap Token
    return view('page-customer.v_detailpesanan', compact('snapToken', 'pesanan'));
}

public function callback(Request $request){
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512',$request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    if($hashed == $request->signature_key){
        if($request->transaction_status == 'capture'){
            $pesanan = PesananModel::find($request->order_id);
            $pesanan->update(['statusBayarDP' => 'Dibayar']);
        }
    }
}

public function paymentSukses(Request $request)
    {
        $id_pesanan = $request->query('id_pesanan');

        // Jika transaksi sukses (berstatus 'settlement' atau 'capture')

        // Update status di tabel pemesanan menjadi 'Sudah'
        // $pemesanan = Pemesanan::where('id_pmsan', $orderId)->first();
        $pemesanan = PesananModel::with('user')->where('id_pesanan', $id_pesanan)->first();
        $pesanan = PesananModel::all();


        if ($pemesanan) {
            $pemesanan->statusBayarDP = 'Dibayar';
            $pemesanan->tanggal_bayar_dp = now();
            $pemesanan->save();
        }

        return view('page-customer.v_dp', compact('pesanan'));
    }
}


