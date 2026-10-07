<?php

// app/Http/Controllers/KalenderController.php
namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

// app/Http/Controllers/KalenderController.php
namespace App\Http\Controllers;

use App\Models\PesananModel;  // Menggunakan model PesananModel
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function getTanggalAcara()
    {
        // Ambil data tanggal acara dari tabel tb_pesanan menggunakan model PesananModel
        $pesanan = PesananModel::select('tanggal_acara')->get();

        // Format data untuk kalender FullCalendar
        $events = $pesanan->map(function($item) {
            return [
                'title' => 'Acara Terpesan',  // Nama acara bisa disesuaikan
                'start' => $item->tanggal_acara,  // Tanggal acara dari database
                'isAvailable' => false,  // Menandakan tanggal terpesan
            ];
        });

        return response()->json($events);
    }
}
