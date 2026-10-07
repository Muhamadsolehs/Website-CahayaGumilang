<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key'); // Ambil server key dari config
        Config::$isProduction = false; // Set false untuk sandbox (pengembangan)
        Config::$isSanitized = true; // Aktifkan sanitasi data
        Config::$is3ds = true; // Aktifkan 3D Secure
    }

    public function createTransaction($pesanan)
    {
        // Buat parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id_pesanan, // ID pesanan unik
                'gross_amount' => $pesanan->total_biaya, // Total biaya
            ],
            'customer_details' => [
                'first_name' => $pesanan->nama, // Nama pelanggan
                'phone' => $pesanan->telepon, // Nomor telepon pelanggan
            ],
        ];

        // Mengembalikan Snap token
        return Snap::getSnapToken($params);
    }
}
