<?php

namespace App\Http\Controllers;

use Carbon\carbon;
use Illuminate\Http\Request;
use App\Models\PesananModel; // Model untuk tabel pembayaran
use App\Models\PengeluaranModel; // Model untuk tabel pengeluaran

class LaporanKeuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari tabel pembayaran (debit)
        $debit = PesananModel::select('created_at', 'jumlah_dp', 'total_tagihan', 'nama', 'statusBayarDP', 'statusBayarPelunasan', 'tanggal_bayar_dp', 'tanggal_bayar_pelunasan')
            ->orderBy('created_at', 'asc')
            ->get()
            ->flatMap(function ($item) {
                $entries = [];

                if ($item->statusBayarDP === 'Dibayar') {
                    $entries[] = [
                        'tanggal' => $item->tanggal_bayar_dp, // Gunakan tanggal pembayaran DP
                        'keterangan' => "Pembayaran DP atas nama {$item->nama}",
                        'debit' => $item->jumlah_dp,
                        'kredit' => null,
                    ];
                }

                if ($item->statusBayarPelunasan === 'Dibayar') {
                    $sisa_bayar = $item->total_tagihan - $item->jumlah_dp;
                    $entries[] = [
                        'tanggal' => $item->tanggal_bayar_pelunasan, // Gunakan tanggal pembayaran pelunasan
                        'keterangan' => "Pembayaran pelunasan atas nama {$item->nama}",
                        'debit' => $sisa_bayar,
                        'kredit' => null,
                    ];
                }


                return $entries;
            });





        // Ambil data dari tabel pengeluaran (kredit)
        $kredit = PengeluaranModel::select('tanggal_pengeluaran', 'jumlah', 'deskripsi')
            ->orderBy('tanggal_pengeluaran', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal_pengeluaran,
                    'keterangan' => $item->deskripsi,
                    'debit' => null,
                    'kredit' => $item->jumlah,
                ];
            });

        $laporanKeuangan = $debit->merge($kredit)
            ->sortBy('tanggal')
            ->values();


        // Hitung total debit dan kredit
        $totalDebit = $laporanKeuangan->sum('debit');
        $totalKredit = $laporanKeuangan->sum('kredit');
        $saldoAkhir = $totalDebit - $totalKredit;

        return view('page-admin.data-laporanKeuangan.v_laporankeuangan', compact('laporanKeuangan', 'totalDebit', 'totalKredit', 'saldoAkhir'));
    }

    public function cetak(Request $request)
    {
        // Ambil data dari tabel pembayaran (debit)
        $debit = PesananModel::select('created_at', 'jumlah_dp', 'nama')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->created_at,
                    'keterangan' => "Pembayaran dp atas nama {$item->nama}",
                    'debit' => $item->jumlah_dp,
                    'kredit' => null,
                ];
            });

        // Ambil data dari tabel pengeluaran (kredit)
        $kredit = PengeluaranModel::select('tanggal_pengeluaran', 'jumlah', 'deskripsi')
            ->orderBy('tanggal_pengeluaran', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'tanggal' => $item->tanggal_pengeluaran,
                    'keterangan' => $item->deskripsi,
                    'debit' => null,
                    'kredit' => $item->jumlah,
                ];
            });

        $laporanKeuangan = $debit->merge($kredit)
            ->sortBy('tanggal')
            ->values();


        // Hitung total debit dan kredit
        $totalDebit = $laporanKeuangan->sum('debit');
        $totalKredit = $laporanKeuangan->sum('kredit');
        $saldoAkhir = $totalDebit - $totalKredit;

        return view('page-admin.data-laporanKeuangan.v_cetak', compact('laporanKeuangan', 'totalDebit', 'totalKredit', 'saldoAkhir'));
    }


    public function filter(Request $request)
    {
        // Query untuk PesananModel
        $pesananQuery = PesananModel::query();
        $pengeluaranQuery = PengeluaranModel::query();

        // Filter berdasarkan bulan
        if ($request->month) {
            $pesananQuery->where(function ($q) use ($request) {
                $q->whereMonth('tanggal_bayar_dp', $request->month)
                  ->orWhereMonth('tanggal_bayar_pelunasan', $request->month);
            });

            $pengeluaranQuery->whereMonth('tanggal_pengeluaran', $request->month);
        }

        // Filter berdasarkan tahun
        if ($request->year) {
            $pesananQuery->where(function ($q) use ($request) {
                $q->whereYear('tanggal_bayar_dp', $request->year)
                  ->orWhereYear('tanggal_bayar_pelunasan', $request->year);
            });

            $pengeluaranQuery->whereYear('tanggal_pengeluaran', $request->year);
        }

        // Ambil hasil query
        $pesanan = $pesananQuery->get();
        $pengeluaran = $pengeluaranQuery->get();

        // Gabungkan data
        $laporanKeuangan = collect();

        foreach ($pesanan as $item) {
            if ($item->statusBayarDP === 'Dibayar') {
                $laporanKeuangan->push([
                    'tanggal' => $item->tanggal_bayar_dp,
                    'keterangan' => "Pembayaran DP atas nama {$item->nama}",
                    'debit' => $item->jumlah_dp,
                    'kredit' => null,
                ]);
            }
            if ($item->statusBayarPelunasan === 'Dibayar') {
                $sisa_bayar = $item->total_tagihan - $item->jumlah_dp;
                $laporanKeuangan->push([
                    'tanggal' => $item->tanggal_bayar_pelunasan,
                    'keterangan' => "Pembayaran pelunasan atas nama {$item->nama}",
                    'debit' => $sisa_bayar,
                    'kredit' => null,
                ]);
            }
        }

        foreach ($pengeluaran as $item) {
            $laporanKeuangan->push([
                'tanggal' => $item->tanggal_pengeluaran,
                'keterangan' => $item->deskripsi,
                'debit' => null,
                'kredit' => $item->jumlah,
            ]);
        }

        // Hitung total debit, kredit, dan saldo akhir
        $totalDebit = $laporanKeuangan->sum('debit');
        $totalKredit = $laporanKeuangan->sum('kredit');
        $saldoAkhir = $totalDebit - $totalKredit;

        return view('page-admin.data-laporankeuangan.v_laporankeuangan', compact('laporanKeuangan', 'totalDebit', 'totalKredit', 'saldoAkhir'));
    }





}


?>
